class Message < ActiveRecord::Base
  belongs_to :post
  belongs_to :user

  validates :author, presence: true
  validates :message, presence: true, length: { in: 5..100 }
end