class ProductsController < ApplicationController
	def index
		@products = Product.all
	end

	def show
		@product = Product.find(params[:id])
		puts @product.id
	end

	def new
		
	end

	def edit

	end

	def create
		@product = Product.create(name: params[:name], description: params[:description])
		# render text: "create a new product"
		redirect_to "/products"
	end

	def update

	end

	def destroy
		puts "Destroy"
		puts params[:id]
		Product.find(params[:id]).destroy
		# render text: "destroy a product"
		redirect_to "/products"
	end
end
