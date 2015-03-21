class UsersController < ApplicationController

	def index
		redirect_to posts_path
	end

	def show
		@user = User.find(params[:id])
		@total_posts = Post.where(user_id: @user.id).count
		puts @post_num
	end

	def new
		redirect_to root_path
	end

	def edit
		redirect_to root_path
	end

	def create
		@user = User.new(user_params)

		puts user_params

		if @user.save
			sign_in(@user)
			flash[:success] = "Welcome " + @user.name
			redirect_to "/bright_ideas/"
		else
			flash[:danger] = @user.errors.full_messages
			redirect_to root_path
		end
	end

	def update
		redirect_to root_path
	end

	def destroy
		redirect_to root_path
	end 

	private
		def user_params
			params.require(:user).permit(:name, :alias, :email, :password, :password_confirmation)
		end
end
