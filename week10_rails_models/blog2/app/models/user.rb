class User < ActiveRecord::Base
	EMAIL_REGEX = /\A([^@\s]+)@((?:[-a-z0-9]+\.)+[a-z]+)\z/i
	NAME_REGEX = /\A[a-zA-Z\s]+\z/

	has_many :posts
	has_many :messages
	has_many :owners
	has_many :blogs, :through => :owners

	validates :first_name, :last_name, presence: true, format: { with: NAME_REGEX }
	validates :email, presence: true, uniqueness: { case_sensitive: false }, format: { with: EMAIL_REGEX }
end