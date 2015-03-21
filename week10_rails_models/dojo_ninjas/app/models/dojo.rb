class Dojo < ActiveRecord::Base
	has_many :ninjas, dependent: :destroy
	validates :name, :city, presence: true
	validates :state, presence: true, length: { minimum: 2 }
end
