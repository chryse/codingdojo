class User < ActiveRecord::Base
	# attr_accessor :first_name, :last_name, :email, :age

	validates :first_name, :last_name, presence: true, length: { minimum: 2 }
	validates :email, presence: true
	validates :age, presence: true, 
			   numericality: {
			   greater_than_or_equal_to: 10, less_than_or_equal_to: 150 }

end
