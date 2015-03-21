class RandomWordController < ApplicationController
	def index
		# session.clear
		if (!session[:count])
			session[:count] = 0
		end
		if (!session[:result])
			session[:result] = "result here"	
		end
	end
	
	def create
		length = 14
		pool = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
		result = ""

  		length.times do
  			result += pool[rand(pool.size)]
  			# result << pool[rand(pool.size)]
  		end
  		# puts result

  		session[:count] += 1
  		session[:result] = result
		redirect_to "/"
	end
end
