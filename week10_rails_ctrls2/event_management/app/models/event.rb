class Event < ActiveRecord::Base
	attr_accessor :password, :password_confirmation
  
  	belongs_to :user
  	has_many :comments, dependent: :destroy

  	has_many :relationships, foreign_key: "event_id", dependent: :destroy

	has_many :users, through: :relationships, dependent: :destroy

  	validates :name, :date, :location, :state, :user_id, presence: true

  	validate :is_future?

  	def format_date
    	self.date.strftime("%b %d, %Y")
  	end

	private
		def is_future?
			if(self.date)
				now = Time.now.strftime("%Y-%m-%d")
				date = self.date.strftime("%Y-%m-%d")
				errors.add("date", "Date should be future date.") if date < now
			end
		end
end
