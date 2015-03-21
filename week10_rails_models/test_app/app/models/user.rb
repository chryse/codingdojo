class User < ActiveRecord::Base
	attr_accessor :first_name, :last_name, :email, :age

	has_many :products

	EMAIL_REGEX = /\A([^@\s]+)@((?:[-a-z0-9]+\.)+[a-z]+)\z/i

	validates :first_name, :last_name, presence: true, length: { minimum: 2 }
	validates :email, presence: true, uniqueness: { case_sensitive: false }, format: { with: EMAIL_REGEX }
end
