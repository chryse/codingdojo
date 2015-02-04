<?php
defined("BASEPATH") OR exit("No direct script access allowed.");

class Users extends CI_Controller {

	private $view_data = [];

	public function __construct()
	{
		parent::__construct();
		// $this->output->enable_profiler();

		// logged in check
		if(!$this->session->userdata("user")["is_logged_in"]) {
			redirect("/signin");
		}
		else {
			// load data User model
			$this->load->model("User");

			// data for view page
			$this->view_data["is_logged_in"] = $this->session->userdata("user")["is_logged_in"];
			$this->view_data["signin_user_id"] = $this->session->userdata("user")["id"];
		}
	}

	public function index()
	{
		redirect("/dashboard");
	}

	public function user_new()
	{
		$this->view_data["title"] = "Add a new user";
		$this->view_data["is_logged_in"] = $this->session->userdata("user")["is_logged_in"];
		$this->load->view("add_user", $this->view_data);
	}

	public function add_process()
	{
		// var_dump($this->input->post());
		if($this->input->post("action") == "adduser") {
			$this->add_user($this->input->post());	
		}
		else {
			redirect("/dashboard");
		}
	}

	private function add_user($post)
	{
		// load form validation library
		$this->load->library("form_validation");

		// validation rules
		$validation_rules = [
								[
								 "field" => "first_name",
								 "label" => "First name",
								 "rules" => "trim|required",
								 "errors"=> [
								 			 "required" => "%s can't be blank."
								 			]
								],
								[
								 "field" => "last_name",
								 "label" => "Last name",
								 "rules" => "trim|required",
								 "errors"=> [
								 			 "required" => "%s can't be blank."
								 			]
								],
								[
								 "field" => "email",
								 "label" => "Email",
								 "rules" => "valid_email",
								 "errors"=> [
								 			 "valid_email" => "%s is invalid. Please try again."
								 			]
								],
								[
								 "field" => "password",
								 "label" => "Password",
								 "rules" => "required",
								 "errors"=> [
								 			 "required" => "%s should be not empty."
								 			]
								],
								[
								 "field" => "confirm_password",
								 "label" => "Confirm Password",
								 "rules" => "required|matches[password]",
								 "errors"=> [
								 			 "required" => "%s does not match."
								 			]
								]
							];

		$this->form_validation->set_rules($validation_rules);

		// validation fail
		if($this->form_validation->run() == false) {
			$this->session->set_flashdata("signin_errors", validation_errors());
			redirect("/users/new");
		}

		// validation success
		else {

			// email already exists, fail to sign up
			if($this->User->exist_email($post["email"])) {
				$this->session->set_flashdata("signin_errors", "The email you enter already exists.");
				redirect("/users/new");
			}

			// success to signup
			else {
				$add = $this->User->add_user($post);

				// success to insert
				if($add) {
					// if user addition is successful, add user level as normal
					$user = $this->User->get_user_by_email($post["email"]);
					if($user["id"]) {
						$this->User->set_user_level($user["id"], 1);
						// goto dashboard
						redirect("/dashboard");
					}
					else {
						$this->session->set_flashdata("signin_errors", "Registration fails, please try again.");
						redirect("/users/new");
					}
				}

				// fail to insert
				else {
					$this->session->set_flashdata("signin_errors", "Registration fails, please try again.");
					redirect("/users/new");
				}
			}
		}
	}

	public function edit($id)
	{
		$user = $this->User->get_user_by_id($id);
		$this->view_data["title"] = "Edit {$user['first_name']} {$user['last_name']}";
		$this->view_data["user"] = $user;
		$this->view_data["current_url"] = current_url();
		$this->load->view("edit_user", $this->view_data);
	}

	public function edit_profile($id)
	{
		$user = $this->session->userdata("user");
		$this->view_data["title"] = "Edit {$user['first_name']} {$user['last_name']}";
		$this->view_data["user"] = $user;
		$this->view_data["current_url"] = current_url();
		$this->load->view("edit_profile", $this->view_data);
	}

	public function edit_process()
	{
		// load form validation library
		$this->load->library("form_validation");

		// user info edition
		if($this->input->post("user_id") && $this->input->post("action") == "edit_info") {

			// get post info 
			$new_user_data = $this->input->post();

			$validation_rules = [
									[
									  "field" => "first_name",
								 	  "label" => "First name",
								 	  "rules" => "trim|required",
								 	  "errors"=> [
								 			 	  "required" => "%s can't be blank."
								 				 ]
									],
									[
									   "field" => "last_name",
								 	   "label" => "Last name",
								 	   "rules" => "trim|required",
								 	   "errors"=> [
								 			 	   "required" => "%s can't be blank."
								 				  ]
									],
									[
									  "field" => "email",
								 	  "label" => "Email",
								 	  "rules" => "valid_email",
								 	  "errors"=> [
								 				  "valid_email" => "%s is invalid. Please try again."
								 				 ]
									]
								];

			$this->form_validation->set_rules($validation_rules);

			// validation fails
			if($this->form_validation->run() == false) {
				$this->session->set_flashdata("input_errors1", validation_errors());
				redirect($new_user_data["current_url"]);
			}

			// validation success
			else {
				// email already exists, fail to sign up
				// if($this->User->exist_email($new_user_data["email"])) {
					// $this->session->set_flashdata("input_errors1", "The email you enter already exists.");
					// redirect($new_user_data["current_url"]);
				// }

				// else {
					$this->User->edit_user_info($new_user_data);
					redirect("/dashboard");
				// }
				
			}
		}

		// password update
		else if($this->input->post("user_id") && $this->input->post("action") == "change_password") {

			// get post info 
			$new_user_data = $this->input->post();

			$validation_rules = [
									[
									 "field" => "password",
									 "label" => "Password",
									 "rules" => "required",
									 "errors"=> [
									 			 "required" => "%s should be not empty."
									 			]
									],
									[
									 "field" => "confirm_password",
									 "label" => "Confirm Password",
									 "rules" => "required|matches[password]",
									 "errors"=> [
									 			 "required" => "%s does not match."
									 			]
									]
								];

			$this->form_validation->set_rules($validation_rules);

			// validation fails
			if($this->form_validation->run() == false) {
				$this->session->set_flashdata("input_errors2", validation_errors());
				redirect($new_user_data["current_url"]);
			}

			// validation success
			else {
				// password update
				$this->User->edit_password($new_user_data);
				redirect("/dashboard");
			}
		}

		else if($this->input->post("user_id") && $this->input->post("action") == "add_description") {

			// get user info from post
			$new_user_data = $this->input->post();
			$this->User->edit_description($new_user_data);
			redirect("/users/show/" . $new_user_data["user_id"]);
		}

		// malicious access
		else {
			redirect("/dashboard");
		}		
	}

	public function remove($id)
	{
		$user = $this->User->get_user_by_id($id);
		$this->view_data["title"] = "Delete {$user['first_name']} {$user['last_name']}?";
		$this->view_data["user"] = $user;

		$this->load->view("delete_user", $this->view_data);
	}

	public function remove_process()
	{
		if($this->input->post("user_id") && $this->input->post("submit") == "submit") {
			$this->User->remove_user($this->input->post("user_id"));
			redirect("/dashboard");
		}
		else {
			redirect("/dashboard");
		}
	}

	public function show($id)
	{
		$user = $this->User->get_user_by_id($id);
		$this->view_data["title"] = "{$user['first_name']} {$user['last_name']}'s page";
		$this->view_data["user"] = $user;
		$this->view_data["current_url"] = current_url();
		$this->view_data["messages"] = $this->show_all_messages($id);

		// load view 
		$this->load->view("user_page", $this->view_data);
		// $this->load->view("message", $this->view_data);
		
		// load message model
		$this->load->model("Message");

		$messages = $this->Message->get_all_messages($id);
	}

	private function show_all_messages($written_user_id)
	{
		// load message model
		$this->load->model("Message");

		$retrieved_messages = $this->Message->get_all_messages($written_user_id);

		$messages = "";

		foreach($retrieved_messages as $message) {
			$time = $this->time_stamp($message["created_at"]);
			$messages .= "<div class='row message-box'>";
			$messages .= "	<div class='col-md-8 message-title'>";	
			$messages .= "		<a href='/users/show/{$message['writer_user_id']}'>{$message['writer_user_first_name']} {$message['writer_user_last_name']}</a> Wrote";
			$messages .= "	</div>";
			$messages .= "	<div class='col-md-4 message-title text-right'>";
			$messages .= "		{$time}";
			$messages .= "	</div>";
			$messages .= "	<div class='message-content col-md-12'>";
			$messages .= "		{$message['message']} <br />";
			$messages .= "	</div>";
			$messages .= "	<div class='comment-content col-md-12'>";
			$messages .= 		$this->show_all_comments($message["message_id"]);
			$messages .="	</div>";
			$messages .="	<div class='col-md-2 text-right'>";
			$messages .="		<a href='/users/show/{$this->session->userdata['user']['id']}'>";
			$messages .="			{$this->session->userdata['user']['first_name']} {$this->session->userdata['user']['last_name']}";
			$messages .="		</a>";
			$messages .="	</div>";
			$messages .="	<div class='col-md-10'>";
			$messages .= 		$this->draw_comment_form($message["message_id"]);
			$messages .="	</div>";
			$messages .= "</div>";
		}
		return $messages;
	}

	private function show_all_comments($message_id)
	{
		$this->load->model("Message");

		$comments = "";
		$retrieved_comments = $this->Message->get_all_comments($message_id);
		foreach($retrieved_comments as $comment) {
			$comments .= "<div class='row'>";
			$comments .= "<div class='col-md-2 text-right'>";
			$comments .= "	<a href='/users/show/{$comment['user_id']}'>{$comment['first_name']} {$comment['last_name']}</a>";
			$comments .= "</div>";
			$comments .= "<div class='col-md-8'>";
			$comments .= "	{$comment['comment']}";
			$comments .= "</div>";
			$comments .= "<div class='col-md-2'>";
			$comments .= "	{$comment['created_at']}";
			$comments .= "</div>";
			
			$comments .= "</div>";
		}

		return $comments;
	}

	private function draw_comment_form($message_id) {
		$form = "";
		$form .= "<form method='post' action='/messages/add_comment'>
					<div class='form-group'>
						<textarea class='form-control' rows='3' name='comment' placeholder='Leave a comment!'></textarea>
					 </div>
					<div class='form-group text-right'>
						<input type='hidden' name='message_id' value='$message_id'>
						<input type='hidden' name='submit' value='{$this->view_data["current_url"]}'>
						<button class='btn btn-success' type='submit'>Add Comment</button>
					</div>
				  </form>";
		return $form;
	}

	private function time_stamp($timestamp)
	{
		$difference = time() - $timestamp;
	    $periods = array("sec", "min", "hour", "day", "week", "month", "years", "decade");
	    $lengths = array("60","60","24","7","4.35","12","10");

	    if ($difference > 0) {
	        $ending = "ago";
	    }
	    else {
			$difference = -$difference;
			$ending = "to go";
	    }

	    for($j = 0; $difference >= $lengths[$j]; $j++) {
			$difference /= $lengths[$j];
	    }

	    $difference = round($difference);

	    if($difference != 1) {
			$periods[$j].= "s";
	    }
	    
	    return $difference . " " . $periods[$j] . " ". $ending;
	}
}