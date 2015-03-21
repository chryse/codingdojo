class User < ActiveRecord::Base
  #this allows my form to contain a password field and use it on the model side, even though there is no field
  #in my database called password (we used encrypted_password)
  attr_accessor :password, :password_confirmation

  has_many :posts, dependent: :destroy
  has_many :comments
  has_many :active_relationships, class_name:  "Relationship",
                                  foreign_key: "follower_id",
                                  dependent:   :destroy

  has_many :passive_relationships, class_name:  "Relationship",
                                   foreign_key: "followed_id",
                                   dependent:   :destroy                                  
  has_many :following, through: :active_relationships, source: :followed

  has_many :followers, through: :passive_relationships, source: :follower                                

  email_regex = /\A([^@\s]+)@((?:[-a-z0-9]+\.)+[a-z]+)\z/i

  validates :first_name, presence: true, length: { maximum: 30 }
  
  validates :last_name, presence: true, length: { maximum: 30 }
  
  validates :email, presence: true, format: { with: email_regex }, uniqueness: { case_sensitive: false }

  #this validates the form input password

  validates :password, presence: true, confirmation: true, length: { within: 4..100 }



  #before the user gets added to DB, run this function.
  before_save :encrypt_password

  # change email lowercase
  before_save do
    self.email.downcase!
  end

  def full_name
    self.first_name + " " + self.last_name
  end

  def format_created_date
    self.created_at.strftime("%b %d %a, %Y")
  end

  def feed
    Post.where("user_id = ?", id)
    # posts
  end

  # Follows a user.
  def follow(other_user)
    active_relationships.create(followed_id: other_user.id)
  end

  # Unfollows a user.
  def unfollow(other_user)
    active_relationships.find_by(followed_id: other_user.id).destroy
  end

  # Returns true if the current user is following the other user.
  def following?(other_user)
    following.include?(other_user)
  end


  #this method encrypts the user's unencrypted login attempt and returns true if the password is a match
  def has_password?(submitted_password)
    self.encrypted_password == encrypt(submitted_password)
  end


  # class method that checks whether the user's email and submitted password are valid
  def self.authenticate(email, submitted_password)
    user = find_by_email(email)
    return nil if user.nil?
    return user if user.has_password?(submitted_password)
  end


  private
    def encrypt_password
      # generate a unique salt if it's a new user
      # self.password uses the attr_accessor we defined above to allow me to grab the inputed password 
      self.salt = Digest::SHA2.hexdigest("#{Time.now.utc}--#{self.password}") if self.new_record?
    
      # encrypt the password and store that in the encrypted_password field
      self.encrypted_password = encrypt(self.password)  #this self.password is what's in the post data!
    end

    # encrypt the password using both the salt and the passed password
    def encrypt(pass)
      Digest::SHA2.hexdigest("#{self.salt}--#{pass}")
    end
end