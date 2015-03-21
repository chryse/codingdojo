class RelationshipsController < ApplicationController
	before_action :signed_in_user
	
	def create
		puts params
		post = Post.find(params[:relationship][:post_id])

		current_user.like(post)
		# redirect_to request.referer
		redirect_to posts_path
	end

	def destroy
		puts params
		post = Relationship.find(params[:id]).post
		puts post.inspect
		current_user.unlike(post)

		# redirect_to request.referer
		redirect_to posts_path
	end
end