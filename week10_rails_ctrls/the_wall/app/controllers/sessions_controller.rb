class SessionsController < ApplicationController
	def new
	end

	def create
		user = User.authenticate(params[:session][:email].downcase, params[:session][:password])
		if user.nil?
			flash.now[:danger] = "couldn't find a user with those credentials."
			render "new"
			# redirect_to signin_path
			
		else
			sign_in(user)
			# redirect_to user
			# redirect_to user_path(user)
			redirect_back_or home_path
		end
	end

	def destroy
		sign_out
		redirect_to root_path
	end
end