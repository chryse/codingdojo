class Comment < ActiveRecord::Base
  belongs_to :product

  validates :comment, presence: true, length: { maximum: 140 }
  validates :product_id, presence: true

  default_scope -> { order("created_at desc") }
end
