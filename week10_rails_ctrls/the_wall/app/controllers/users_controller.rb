class UsersController < ApplicationController
	before_action :signed_in_user, only: [:index, :edit, :update, :destroy, :show, :following, :followers]
	before_action :correct_user, only: [:edit, :update]
	before_action :admin_user, only: [:destroy]

	def index
		@users = User.paginate(page: params[:page])
	end

	def show
		@user = User.find(params[:id])
		@posts = @user.posts.paginate(page: params[:page])

		# user wall post form
		@post = @user.posts.build
		# for comment form
		@comment = @user.comments.build
	end

	# sign up page for new users
	def new
		@user = User.new
	end

	# user profile edit
	def edit
		@user = User.find(params[:id])
	end

	def create
		@user = User.new(user_params)

		if @user.save
			#success
			sign_in(@user)
			flash[:success] = "Welcome to the Wall!"
			redirect_to @user
			# redirect_to user_path(@user)
		else
			render "new"
		end
	end

	def update
		@user = User.find(params[:id])
		if @user.update_attributes(user_params)
			flash[:success] = "Profile successfully updated."
			redirect_to @user
		else
			render "edit"
		end
	end

	def destroy
		User.find(params[:id]).destroy
		flash[:success] = "User successfully deleted."
		redirect_to users_path
	end

	def following
		@title = "Following"
		@user  = User.find(params[:id])
		@users = @user.following.paginate(page: params[:page])
		@users.inspect
		puts @users
		render "show_follow"
	end

	def followers
		@title = "Followers"
		@user  = User.find(params[:id])
		@users = @user.followers.paginate(page: params[:page])
		render "show_follow"
	end

	private
		def user_params
			params.require(:user).permit(:first_name, :last_name, :email, :password, :password_confirmation)
		end

	    # Confirms the correct user.
	    def correct_user
	      @user = User.find(params[:id])
	      redirect_to(root_url) unless @user == current_user
	    end

	    # Confirms an admin user.
	    def admin_user
	    	redirect_to(root_path) unless current_user.admin?
	    end
end
