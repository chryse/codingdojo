<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	private $view_data = [];

	public function __construct()
	{
		parent::__construct();
		$this->load->model("User");
		$this->load->library("form_validation");
	}

	public function index()
	{
		$this->load->view('index');
	}

	public function login_process()
	{
		if($this->input->post("action") == "register") {
			// var_dump($this->input->post());
			$this->register_user($this->input->post());
		}
		else if($this->input->post("action") == "login") {
			// var_dump($this->input->post());
			$this->login_user($this->input->post());
		}
		else {
			$this->session->sess_destroy();
			redirect("/");
		}
	}


	private function register_user($post) {

		// validation rules
		$validation_rules = [
								[
								 "field" => "name",
								 "label" => "Name",
								 "rules" => "trim|required|callback_name_check",
								 "errors"=> [
								 			 "required" => "%s can't be blank."
								 			]
								],
								[
								 "field" => "alias",
								 "label" => "Alias",
								 "rules" => "trim|required",
								 "errors"=> [
								 			 "required" => "%s can't be blank."
								 			]
								],
								[
								 "field" => "email",
								 "label" => "Email",
								 "rules" => "required|valid_email|is_unique[users.email]",
								 "errors"=> [
								 			 "valid_email" => "%s is invalid. Please try again."
								 			]
								],
								[
								 "field" => "password",
								 "label" => "Password",
								 "rules" => "required|min_length[8]",
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
								],
								[
								 "field" => "birth",
								 "label" => "Date of birth",
								 "rules" => "required",
								 "errors"=> [
								 			 "required" => "%s should be not empty."
								 			]
								]
							];

		$this->form_validation->set_rules($validation_rules);

		// validation fails
		if($this->form_validation->run() == false) {
			$this->session->set_flashdata("login_errors", validation_errors());
			redirect("/");
		}

		// validation success
		else {

			// success to signup
			$add = $this->User->add_user($post);

			// success to insert
			if($add) {
				$retrieved_user = $this->User->fetch_user_by_email($post["email"]);

				// make login session
				$user = [
							"id"			=> $retrieved_user["id"],
							"email"			=> $retrieved_user["email"],
							"name"			=> $retrieved_user["name"],
							"alias"			=> $retrieved_user["alias"],
							"birth"			=> $retrieved_user["birth"],
							"is_logged_in"	=> $retrieved_user["is_logged_in"]
				];

				// store user info to session user
				$this->session->set_userdata("user", $user);

				// goto friedns page
				redirect("/friends");

			}

			// fail to insert
			else {
				$this->session->set_flashdata("login_errors", "Registration fails, please try again.");
				redirect("/");
			}	
		}
	}

	private function login_user($post) {

		// // validation rules
		$validation_rules = [
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
								]
							];

		$this->form_validation->set_rules($validation_rules);

		// login validation fails
		if($this->form_validation->run() == false) {
			$this->session->set_flashdata("login_errors", validation_errors());
			redirect("/");
		}
		else {
			
			$user = $this->User->fetch_user_by_email($post["email"]);
			$encrypted_password = crypt($post["password"], $user["password"]);

			// login success
			if($post["email"] && $encrypted_password === $user["password"]) {

				//make login session
				$user = [
							"id" 			=> $user["id"],
							"email" 		=> $user["email"],
							"name" 			=> $user["name"],
							"alias" 		=> $user["alias"],
							"is_logged_in" 	=> 1
						];
				$this->session->set_userdata("user", $user);
				$this->User->update_user_log($user);

				redirect("/friends");
			}
			else {
				redirect("/");
			}
		}
	}

	// callback function for name check
	public function name_check($name) {
		$name_pattern = "/^[a-zA-Z\s]+$/";
		if(preg_match($name_pattern, $name)) {
			return true;
		}
		else {
			$this->form_validation->set_message("name_check", "%s has invalid characters!");
			return false;
		}
	}

	public function logout()
	{
		$user["id"] = $this->session->userdata("user")["id"];
		$user["is_logged_in"] = 0;
		$this->User->update_user_log($user);
		$this->session->sess_destroy();
		redirect("/");
	}

}
