class GreatGameController < ApplicationController
  def index
  	# session.clear
  	if(!session[:number])
  		session[:number] = rand(1..100)
  	end
  	puts session[:number]
  end

  def guess
  	if(is_numeric?(params[:guess]))
  		guess = params[:guess].to_f
  		if( guess > session[:number])
  			flash[:message] = "Too high!"
  		elsif(guess < session[:number])
  			flash[:message] = "Too low!"
  		end

  		if(guess == session[:number])
  			flash[:correct] = "#{session[:number]} was the number!"
  		end
  	else
  		flash[:error] = "Wrong input"
  	end

  	redirect_to "/"
  	
  end

  def reset
  	session.clear
  	redirect_to "/"
  end

  private
  	def is_numeric?(string)
  		true if Float string rescue false
  	end
end
