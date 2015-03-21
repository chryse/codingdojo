class RelationshipsController < ApplicationController
	before_action :signed_in_user

	def create
		user = User.find(params[:relationship][:followed_id])
		
		# come from User model method
		current_user.follow(user)
		
		# redirect_to request.referer
		redirect_to user_path(user)
	end

	def destroy
		puts params
		user = Relationship.find(params[:id]).followed
		current_user.unfollow(user)

		# redirect_to user_path(user)
		redirect_to request.referer
		
	end
end