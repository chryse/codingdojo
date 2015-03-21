class Post < ActiveRecord::Base
  belongs_to :user
  belongs_to :blog
  has_many :messages

  validates :title, presence: true, length: { minimum: 5 }
  validates :content, presence: true,  length: { maximum: 500 }

end