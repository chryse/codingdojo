class CommentsController < ApplicationController

	def index
		@comments = Product.joins(:comments).select("distinct comments.created_at as c_created_at, *").order("c_created_at desc")
	end

	def create
		
		@product = Product.find(params[:comment][:product_id])
		@category = Category.find(@product.category_id)
		@comments = @product.comments
		@comment = Product.find(params[:comment][:product_id]).comments.create(comment_params)
		
		if @comment.valid?
			redirect_to "/products/show/#{params[:comment][:product_id]}"
		else
			render "products/show"
		end
	end

	private
		def comment_params
			params.require(:comment).permit(:comment)
		end
end
