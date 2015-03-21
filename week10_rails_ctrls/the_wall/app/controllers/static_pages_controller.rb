class StaticPagesController < ApplicationController
	def home
		if signed_in?
			# user wall post form
			@post = current_user.posts.build
			# for comment form
			@comment = current_user.comments.build
			
			@feed_items = current_user.feed.paginate(page: params[:page])
		end
	end

	def about
	end

	def help
	end

	def contact
	end
end
