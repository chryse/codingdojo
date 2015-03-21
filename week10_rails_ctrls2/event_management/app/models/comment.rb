class Comment < ActiveRecord::Base
  belongs_to :event
  belongs_to :user

  validates :user_id, presence: true
  validates :event_id, presence: true
  validates :content, presence: true, length: { in: 4..100 }

  default_scope -> { order(created_at: :desc) }
end
