class ProductsController < ApplicationController
  def index
  	@products = Category.joins(:products).select("distinct categories.name as c_name, products.id as p_id, *").order("p_id asc")
  end

  def new
  	@product = Product.new
    @categories = Category.all
  end

  def show
  	@product = Product.find(params[:id])
    @category = Category.find(@product.category_id)    
  end

  def edit
  	@product = Product.find(params[:id])
    @category = Category.find(@product.category_id)
    @categories = Category.all
  end

  def create
  	@product = Product.create(product_params)
    @categories = Category.all
    puts product_params
  	if @product.valid?
		  redirect_to "/products/"
  	else
  		render "new"
    end
  end

  def update
  	@product = Product.find(params[:id])
    @category = Category.find(@product.category_id)
    @categories = Category.all
  	if @product.update_attributes(product_params)
  		redirect_to "/products"
  	else
  		render "edit"
 	  end
  end

  def destroy
  	@product = Product.find(params[:id]).destroy
  	redirect_to "/products/"
  end

  private
  	def product_params
  		params.require(:product).permit(:name, :description, :price, :category_id)
  	end
end
