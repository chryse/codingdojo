<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homes extends CI_Controller {

	private $view_data = [];

	public function __construct()
	{
		parent::__construct();
		// $this->output->enable_profiler();

		// logged in check
		if(!$this->session->userdata("user")["is_logged_in"]) {
			$this->view_data["is_logged_in"] = false;
		}
		else {
			$this->view_data["is_logged_in"] = $this->session->userdata("user")["is_logged_in"];
			$this->view_data["signin_user_id"] = $this->session->userdata("users")["id"];
		}
	}

	public function index()
	{	
		$this->view_data["title"] = "Welcome to Dashboard";
		$this->load->view("home", $this->view_data);
	}

	public function about()
	{
		$this->view_data["title"] = "About";
		$this->load->view("about", $this->view_data);
	}

	public function contact()
	{
		$this->view_data["title"] = "Contact";
		$this->load->view("contact", $this->view_data);
	}

	public function signin()
	{
		$this->view_data["title"] = "Sign In";
		$this->load->view("signin", $this->view_data);
	}

	public function signup()
	{
		$this->view_data["title"] = "Sign Up";
		$this->load->view("signup", $this->view_data);
	}

	public function signout()
	{
		$this->session->sess_destroy();
		redirect("/");
	}

	public function signin_process()
	{
		
		if($this->input->post("action") == "signin") {
			$this->signin_user($this->input->post());
		}
		else if($this->input->post("action") == "signup") {
			$this->signup_user($this->input->post());	
		}

		// logout or malicious accsss to login-process page
		else {
			$this->session->sess_destroy();
			redirect("/");
		}
	}

	private function signin_user($post)
	{
		// load form_validation library
		$this->load->library("form_validation");

		$validation_rules = [
								[
								 "field" 	=> "email", 
								 "label" 	=> "email",
								 "rules" 	=> "required|valid_email",
								 "errors"	=> ["required" => "You must provide your %s."],
								 			   ["valid_email" => "You must provide a valid %s."]
								],

								[
								 "field" 	=> "password",
								 "label" 	=> "password",
								 "rules" 	=> "required",
								 "errors" 	=> ["required" => "You must provide your %s."]
								]
							];
		$this->form_validation->set_rules($validation_rules);

		// fail to form validation test
		if($this->form_validation->run() == false) {
			$this->session->set_flashdata("signin_errors", validation_errors());
			redirect("/signin");
		}

		// validation pass
		else {

			// search database
			$this->load->model("User");
			$user = $this->User->get_user_by_email($post["email"]);
			$encrypted_password = crypt($post["password"], $user["password"]);

			// login success
			if($post["email"] && $encrypted_password === $user["password"]) {

				//make login session
				$user = [
							"id" 			=> $user["id"],
							"email" 		=> $user["email"],
							"first_name" 	=> $user["first_name"],
							"last_name" 	=> $user["last_name"],
							"level"			=> $user["level"],
							"is_logged_in" 	=> true
						];
				$this->session->set_userdata("user", $user);
				redirect("/dashboard");
			}

			// login information does not match
			else {
				$this->session->set_flashdata("signin_errors", "Login information did not match. Please try again.");
				redirect("/signin");
			}
			
		}
	}

	private function signup_user($post)
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

		// validation fails
		if($this->form_validation->run() == false) {
			$this->session->set_flashdata("signin_errors", validation_errors());
			redirect("/signup");
		}

		// validation success
		else {

			$this->load->model("User");

			// email already exists, fail to sign up
			if($this->User->exist_email($post["email"])) {
				$this->session->set_flashdata("signin_errors", "The email you enter already exists.");
				redirect("/signup");
			}

			// success to signup
			else {
				$add = $this->User->add_user($post);

				// success to insert
				if($add) {
					$retrieved_user = $this->User->get_user_by_email($post["email"]);

					// make signin session
					$user = [
								"id"			=> $retrieved_user["id"],
								"email"			=> $retrieved_user["email"],
								"first_name"	=> $retrieved_user["first_name"],
								"last_name"		=> $retrieved_user["last_name"],
								// "level"			=> $user["level"],
								"is_logged_in"	=> true
					];

					// set user level
					if($user["id"] == 1) {
						// add user as admin "9" is admin permission
						$this->User->set_user_level($user["id"], 9);
						$user["level"] = 9;	
					}

					else {
						// add user as normal "1" is normal 
						$this->User->set_user_level($user["id"], 1);
						$user["level"] = 1;
					}

					// store user info to session user
					$this->session->set_userdata("user", $user);

					// goto user dashboard
					redirect("/dashboard");
				}

				// fail to insert
				else {
					$this->session->set_flashdata("signin_errors", "Registration fails, please try again.");
					redirect("/signup");
				}
			}
		}
	}
}
