class Friendship < ActiveRecord::Base
	belongs_to :user, class_name: "User"
	belongs_to :friend, class_name: "User"
	# we need to supply class_name because there are no user, friend model

	validates :user_id, presence: true
	validates :friend_id, presence: true
end
