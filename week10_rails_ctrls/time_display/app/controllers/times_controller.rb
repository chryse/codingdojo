class TimesController < ApplicationController
  def main
  	now_time = Time.now
  	@now = {}
  	@now[:date] = now_time.strftime("%b %d (%A), %Y")
  	@now[:time] = now_time.strftime("%H:%M:%S %P")

  	puts @now

  end
end
