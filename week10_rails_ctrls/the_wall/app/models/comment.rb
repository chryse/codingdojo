class Comment < ActiveRecord::Base
  belongs_to :post
  belongs_to :user

  validates :user_id, presence: true
  validates :post_id, presence: true
  validates :content, presence: true, length: { in: 4..140 }

  default_scope -> { order(created_at: :desc) }

  def format_created_date
    self.created_at.strftime("%b %d %a, %Y")
  end
end
