class Post < ActiveRecord::Base
  belongs_to :user

  has_many :relationships, foreign_key: "post_id", dependent: :destroy

  has_many :users, through: :relationships, dependent: :destroy

  validates :user_id, presence: true
  
  validates :content, presence: true, length: { maximum: 140 }

  default_scope -> { order(created_at: :desc) }

end
