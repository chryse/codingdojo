module SessionsHelper
  def sign_in(user)
    session[:user_id] = user.id
    #set the value of the current user, IE use the method below
    self.current_user = (user)
  end
  
  # setter method, set the value of the current user as an instance variable!
  def current_user=(user)
    @current_user = user
  end

  # getter method, returns info of current user
  def current_user
    @current_user ||= User.find(session[:user_id]) if session[:user_id]
  end

  #if there is a current user, IE someone is logged in, this function returns TRUE!
  def signed_in?
    !current_user.nil?
  end

  # Confirms a signed-in user.
  def signed_in_user
    unless signed_in?
      store_location
      flash[:danger] = "Please sign in."
      redirect_to signin_url
    end
  end

  def sign_out
    session[:user_id] = nil
    # session.delete(:user_id)
    #resets the current user to nil using the current_user= setter method
    self.current_user = nil
    # @current_user = nil
  end

  #this function returns true if the user I pass to the function is equal the current user signed in
  def current_user?(user)
    user == self.current_user 
  end

  def deny_access
    redirect_to signin_path, :notice => "Please sign in to access this page."
  end

  # Redirects to stored location (or to the default).
  def redirect_back_or(default)
    redirect_to(session[:forwarding_url] || default)
    session.delete(:forwarding_url)
  end

  # Stores the URL trying to be accessed.
  def store_location
    session[:forwarding_url] = request.url if request.get?
  end

end