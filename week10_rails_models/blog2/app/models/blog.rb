class Blog < ActiveRecord::Base
	has_many :posts
	has_many :owners
	has_many :users, :through => :owners

	validates :name, presence: true, length: { minimum: 2 }
end
