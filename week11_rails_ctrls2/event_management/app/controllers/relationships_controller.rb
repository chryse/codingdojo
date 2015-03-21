class RelationshipsController < ApplicationController
	before_action :signed_in_user
	
	def create
		puts params
		event = Event.find(params[:relationship][:event_id])

		current_user.join(event)
		redirect_to request.referer
	end

	def destroy
		puts params
		event = Relationship.find(params[:id]).event
		puts event.inspect
		current_user.unjoin(event)

		redirect_to request.referer
	end
end
