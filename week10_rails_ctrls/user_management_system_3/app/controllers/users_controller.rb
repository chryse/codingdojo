class UsersController < ApplicationController
  def index
  	@users = User.all
  end

  def show
  	@user = User.find(params[:id])
  end

  def new
  	@user = User.new
  end

  def edit
  	@user = User.find(params[:id])
  end

  def create
  	@user = User.create(user_params)
  	if(@user.invalid?)
  		render "new"
  	else
  		redirect_to "/users/"
  	end
  end

  def destroy
  	@user = User.find(params[:id]).destroy
  	redirect_to "/users/"
  end

  def update
	@user = User.find(params[:id])
	if @user.update_attributes(user_params)
		redirect_to "/users/"
	else
		render "edit"
	end
  end

  private
  	def user_params
  		params.require(:user).permit(:first_name, :last_name, :email_address, :password)
  	end
end
