<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	Class Logins extends CI_controller
	{
		private $errors = [];

		public function index()
		{
			$this->load->view("login");			
		}

		public function login_process()
		{
			if($this->input->post("action") === "login") {
				$this->login_user($this->input->post());
			}
			else if($this->input->post("action") === "registration") {
				$this->register_user($this->input->post());
			}

			// logout or malicious accsss to login-process page
			else {
				$this->session->sess_destroy();
				redirect("login");
			}
		}

		public function login_success()
		{
			$data = [];
			$data["first_name"] = $this->session->userdata["user"]["first_name"];
			$data["last_name"] = $this->session->userdata["user"]["last_name"];
			$data["email"] = $this->session->userdata["user"]["email"];

			$this->load->view("login-success", $data);
		}

		public function logout() {
			$this->session->sess_destroy();
			redirect("login");
		}

		// login process
		private function login_user($post) {

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
				$this->session->set_flashdata("login_errors", validation_errors());
				redirect("login");
			}

			// validation pass
			else {

				// search database
				$this->load->model("Login");
				$user = $this->Login->get_user_by_email($post["email"]);
				$encrypted_password = crypt($post["password"], $user["password"]);

				// login success
				if($post["email"] && $encrypted_password === $user["password"]) {

					// make login session
					$user = [
								"id" 			=> $user["id"],
								"email" 		=> $user["email"],
								"first_name" 	=> $user["first_name"],
								"last_name" 	=> $user["last_name"],
								"is_logged_in" 	=> true
							];
					$this->session->set_userdata("user", $user);
					redirect("login-success");
				}

				// login information does not match
				else {
					$this->session->set_flashdata("login_errors", "Login information did not match. Please try again.");
					redirect("login");
				}
				
			}
		}

		// registration proccess
		private function register_user($post) {

			// load validation form library
			$this->load->library("form_validation");

			// validation rules
			$validation_rules = [
									[
									 "field" => "first_name",
									 "label" => "First name",
									 "rules" => "trim|required",
									 "errors"=> [
									 			 "required" => "First name can't be blank."
									 			]
									],
									[
									 "field" => "last_name",
									 "label" => "Last name",
									 "rules" => "trim|required",
									 "errors"=> [
									 			 "required" => "Last name can't be blank."
									 			]
									],
									[
									 "field" => "email",
									 "label" => "Email",
									 "rules" => "valid_email",
									 "errors"=> [
									 			 "valid_email" => "Your email is invalid. Please try again."
									 			]
									],
									[
									 "field" => "password",
									 "label" => "Password",
									 "rules" => "required",
									 "errors"=> [
									 			 "required" => "Your password should be not empty."
									 			]
									],
									[
									 "field" => "confirm_password",
									 "label" => "Confirm Password",
									 "rules" => "required|matches[password]",
									 "errors"=> [
									 			 "required" => "Your confirm password"
									 			]
									]
								];
			
			$this->form_validation->set_rules($validation_rules);

			// validation fail
			if($this->form_validation->run() == false) {
				$this->session->set_flashdata("login_errors", validation_errors());
				$this->load->view("login");
			}

			// validation success
			else {

				$this->load->model("Login");

				// email already exists, fail to register
				if($this->Login->exist_email($post["email"])) {
					$this->session->set_flashdata("login_errors", "The email you enter already exists.");
					redirect("login");
				}

				// success to register
				else {

					// add user info into database
					$add = $this->Login->add_user($post);

					// success to insert
					if ($add) {
						$user = $this->Login->get_user_by_email($post["email"]);

						// make login session
						$user = [
									"id" 			=> $user["id"],
									"email" 		=> $user["email"],
									"first_name" 	=> $user["first_name"],
									"last_name" 	=> $user["last_name"],
									"is_logged_in" 	=> true
								];
						$this->session->set_userdata("user", $user);
						redirect("login-success");
					}

					// fail to insert
					else {
						$this->session->set_flashdata("registration fails, please try again!");
						redirect("login");
					}
				}
			}
		}
	}
?>