class EventsController < ApplicationController
	before_action :signed_in_user, only: [:index, :edit, :update, :destroy, :show]
	def index
		@events = Event.where(state: current_user.state)

		@other_events = Event.where("state != ?", current_user.state)

		@event = Event.new
	end

	def show
		@event = Event.find(params[:id])
		@comment = Comment.new
		@comments = @event.comments
	end

	def create
		@event = current_user.events.build(event_params)
		@event.user_id = current_user.id
		
		if @event.save
			flash[:success] = ["Event successfully created."]
		else
			flash[:danger] = @event.errors.full_messages
		end

		redirect_to events_path
	end

	def edit
		@event = Event.find(params[:id])
	end

	def update
		@event = Event.find(params[:id])
		if @event.update_attributes(event_params)
			flash[:success] = "Event successfully updated."
		else
			flash[:danger] = @event.errors.full_messages
		end

		redirect_to events_path
	end

	def destroy
		Event.find(params[:id]).destroy
		flash[:success] = "User successfully deleted."
		redirect_to users_path
	end

	private
		def event_params
			params.require(:event).permit(:name, :location, :state, :date)
		end
end
