class CommentsController < ApplicationController
	def create
		# puts params

		comment = Event.find(params[:comment][:event_id]).comments.build(comment_params)
		comment[:user_id] = params[:comment][:user_id]
		# puts @comment.inspect

		# puts @comment.valid?

		if comment.save
			flash[:success] = "Comment successfully created!"
		else
			flash[:danger] = comment.errors.full_messages
		end

		redirect_to request.referrer || root_path
	end

	private
		def comment_params
			params.require(:comment).permit(:content)
		end
end
