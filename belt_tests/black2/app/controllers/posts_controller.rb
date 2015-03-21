class PostsController < ApplicationController

	# prevent malicious access
	before_action :signed_in_user, only: [:index, :edit, :update, :destroy, :show]

	def index
		@posts = Post.all

		@post = Post.new

	end

	def new
		redirect_to root_path 
	end

	def show
		@post = Post.find(params[:id])
	end

	def edit
		redirect_to root_path
	end

	def create
		puts post_params
		@post = current_user.posts.build(post_params)
		@post.user_id = current_user.id

		@post.inspect

		if @post.save
			flash[:success] = ["Post successfully created."]
		else
			flash[:danger] = @post.errors.full_messages
		end

		redirect_to posts_path
	end

	def destroy
		Post.find(params[:id]).destroy
		flash[:danger] = "Post successfully deleted."
		redirect_to "/bright_ideas/"
	end


	private
		def post_params
			params.require(:post).permit(:content)
		end
end
