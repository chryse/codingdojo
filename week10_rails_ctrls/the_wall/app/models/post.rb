class Post < ActiveRecord::Base
  belongs_to :user
  has_many :comments

  validates :user_id, presence: true
  validates :content, presence: true, length: { maximum: 140 }

  default_scope -> { order(created_at: :desc) }

  def format_created_date
    self.created_at.strftime("%b %d %a, %Y")
  end
end
