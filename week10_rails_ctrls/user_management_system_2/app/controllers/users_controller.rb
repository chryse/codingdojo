class UsersController < ApplicationController
  def index
  	@users = User.all
  end

  def new
  end

  def create
  	# puts params[:user]
  	# puts user_params
  	@user = User.create(user_params)
    puts @user.errors.full_messages
    if(@user.errors.full_messages.length > 0)
      flash[:errors] = @user.errors.full_messages
      redirect_to "/users/new"
    else
      redirect_to "/users/"  
    end
  end

  private
  	def user_params
  		params.require(:user).permit(:first_name, :last_name, :email_address, :password)
  	end
end
