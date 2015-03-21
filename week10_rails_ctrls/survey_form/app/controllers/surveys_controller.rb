class SurveysController < ApplicationController
	def index

	end

	def create
		@user = User.create(user_params)
		redirect_to "/result/"
	end

	def result
		@user = User.last
		@count = User.all.count
		puts @count
	end

	private
	def user_params
		params.require(:user).permit(:name, :dojo_location, :favorite_language, :comment)
	end

end
