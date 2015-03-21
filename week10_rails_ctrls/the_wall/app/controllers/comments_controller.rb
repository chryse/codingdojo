class CommentsController < ApplicationController
	before_action :signed_in_user, only: [:create, :destroy]
	before_action :correct_user, only: [:destroy]

	def index

	end

	def create
		# @post = current_user.posts.build(post_params)
		# puts @post.valid?

		puts params
		# a = params[:comment][:post_id]
		# puts a
		# co = Post.find(a)
		# puts co
		@comment = Post.find(params[:comment][:post_id]).comments.build(comment_params)
		@comment[:user_id] = params[:comment][:user_id]
		puts @comment.inspect

		if @comment.save
			flash[:success] = "Comment successfully created!"
		end
		redirect_to request.referrer || root_path
		
	end

	# def destroy
	# 	@post.destroy
 #    	flash[:success] = "Post successfully deleted"
 #    	redirect_to request.referrer || root_url
	# end

	private
		def comment_params
			params.require(:comment).permit(:content)
		end

		def correct_user
			@comment = current_user.posts.find_by(id: params[:id])
			redirect_to root_path if @post.nil?
		end
end