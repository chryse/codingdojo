class User < ActiveRecord::Base
	EMAIL_REGEX = /\A([^@\s]+)@((?:[-a-z0-9]+\.)+[a-z]+)\z/i
	NAME_REGEX = /\A[a-zA-Z\s]+\z/

	validates :first_name, :last_name, presence: true, format: { with: NAME_REGEX }
	validates :email_address, presence: true, uniqueness: { case_sensitivie: false }, format: { with: EMAIL_REGEX }
	validates :password, presence: true
end
