class UsersController < ApplicationController

	def index
		redirect_to events_path
	end

	def show
		redirect_to events_path
	end

	def new
		redirect_to root_path
	end

	def edit
		@user = User.find(params[:id])
	end

	def create
		@user = User.new(user_params)

		if @user.save
			sign_in(@user)
			flash[:success] = "Welcome " + @user.full_name
			redirect_to events_path
		else
			flash[:danger] = @user.errors.full_messages
			redirect_to root_path
		end
	end

	def update
		@user = User.find(params[:id])
		if @user.update_attributes(user_params)
			flash[:success] = "Profile successfully updated."
			redirect_to events_path
		else
			flash[:danger] = @user.errors.full_messages
			redirect_to edit_user_path(@user)
		end
		
	end

	def destroy

	end 

	private
		def user_params
			params.require(:user).permit(:first_name, :last_name, :email, :password, :password_confirmation, :location, :state)
		end

	    # Confirms the correct user.
	    # def correct_user
	    #   @user = User.find(params[:id])
	    #   redirect_to(root_url) unless @user == current_user
	    # end

	    # Confirms an admin user.
	    # def admin_user
	    # 	redirect_to(root_path) unless current_user.admin?
	    # end
end
