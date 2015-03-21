class User < ActiveRecord::Base
	# has_many :friendships, foreign_key: "user_id", dependent: :destroy
	# has_many :friend_ids, through: :friendships, source: :friend_id

	# way to users -> friendships -> users(friends)
	has_many :friendships, foreign_key: "user_id", dependent: :destroy
	has_many :friends, through: :friendships, source: :friend
	
	# way back to users(friends) -> friendships -> users
	has_many :reverse_friendships, foreign_key: "friend_id", class_name: "Friendship", dependent: :destroy
	has_many :reverse_friends, through: :reverse_friendships, source: :user
end
