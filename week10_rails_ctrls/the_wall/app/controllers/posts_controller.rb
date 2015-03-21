class PostsController < ApplicationController
	before_action :signed_in_user, only: [:create, :destroy]
	before_action :correct_user, only: [:destroy]

	def create
		
		@post = current_user.posts.build(post_params)
		puts @post.valid?

		if @post.save
			flash[:success] = "Post successfully created!"
			redirect_to root_url
		else
			@feed_items = []
			render "static_pages/home"
			# redirect_to root_url
		end
	end

	def destroy
		@post.destroy
    	flash[:success] = "Post successfully deleted"
    	redirect_to request.referrer || root_path
	end

	private
		def post_params
			params.require(:post).permit(:content)
		end

		def correct_user
			@post = current_user.posts.find_by(id: params[:id])
			redirect_to root_path if @post.nil?
		end
end
