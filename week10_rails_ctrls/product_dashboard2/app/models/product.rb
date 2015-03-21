class Product < ActiveRecord::Base
  belongs_to :category
  has_many :comments

  validates :name, :description, :price, :category_id, presence: true
  validates :price, numericality: true
end
