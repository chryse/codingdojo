class RpgController < ApplicationController
  def index
  	# session.clear
  	if(!session[:total_gold])
  		session[:total_gold] = 0
  	end
  	if(!session[:activities])
  		session[:activities] = []
  	end
  end

  def process_gold
  	puts params[:where]
  	place = params[:where]
  	if(place == "farm")
  		gold = rand(10..20)
  		
  	elsif(place == "cave")
  		gold = rand(5..10)
  		
  	elsif(place == "house")
  		gold = rand(2..5)
  		session[:total_gold] += gold
  		
  	elsif(place == "casino")
  		possibility = rand(1..100)
  		if(possibility <= 70)
  			gold = rand(-50..0)
  		else
  			gold = rand(0..50)
  		end 		
  	end
  	session[:total_gold] += gold

  	if(gold > 0)
  		session[:activities].push("You entered a #{place} and earned #{gold} golds. #{Time.now.strftime('%A %b %d, %Y %H:%M:%S %P')}")
	else
		gold *= (-1);
		session[:activities].push("You entered a #{place} and lost #{gold} golds... Ouch... #{Time.now.strftime('%A %b %d, %Y %H:%M:%S %P')}")
	# 	$activities[] = "You entered a " . $place 
	# 						. " and lost $gold golds... Ouch... " . date("F d Y g:i A")
	end

  	redirect_to "/"
  end

  def reset
  	if(params[:where] == "reset")
  		session[:activities] = []
  		session[:total_gold] = 0
  	end

  	redirect_to "/"
  end
end
