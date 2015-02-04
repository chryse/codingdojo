<?php
defined("BASEPATH") OR exit("No direct script access allowed.");

class Dashboards extends CI_Controller {

	private $view_data = [];
	private $current_user_level;
	private $users_list;

	public function __construct()
	{
		parent::__construct();
		// $this->output->enable_profiler();

		// logged in check
		if(!$this->session->userdata("user")["is_logged_in"]) {
			redirect("/signin");
		}
		else {
			$this->current_user_level = $this->session->userdata("user")["level"];
			
			// load data User model
			$this->load->model("User");
			$this->users_list = $this->User->get_all_users();

			// data for view page
			$this->view_data["is_logged_in"] = $this->session->userdata("user")["is_logged_in"];
			$this->view_data["title"] = $this->dashboard_title();
			$this->view_data["add_user"] = $this->add_user_button();
			$this->view_data["signin_user_id"] = $this->session->userdata("user")["id"];
		}
	}

	public function index()
	{
		// go to dashboard for admin
		if($this->current_user_level == 9) {
			redirect("/dashboard/admin");
		}

		// go to dashboard for users
		else if($this->current_user_level == 1) {
			$this->view_data["user_list"] = $this->draw_table($this->users_list, $this->current_user_level);
			$this->load->view("dashboard", $this->view_data);
		}

		else {
			redirect("/");
		}
	}

	public function admin()
	{
		$this->view_data["user_list"] = $this->draw_table($this->users_list, $this->current_user_level);
		$this->load->view("dashboard", $this->view_data);
	}

	private function draw_table($users, $current_user_level) {
		// load table class
		$this->load->library("table");
		// change table style
		$templ = array("table_open" => "<table class='table table-striped table-hover'>");
		$this->table->set_template($templ);

		$refined_users = [];

		// for admin table
		if($current_user_level == 9) {
			// table head setting
			$this->table->set_heading("ID", "Name", "Email", "Created at", "User Level", "Actions");

			foreach($users as $user) {

				if($user["level"] == 9) {
					$user["level"] = "admin";
				}

				else if($user["level"] == 1) {
					$user["level"] = "normal";
				}

				if($user["id"] == $this->session->userdata["user"]["id"]) {
					$refined_users[] = [
									"id" 		=> $user["id"],
									"name"		=> $this->add_user_url($user["id"], $user["name"]),
								   	"email"		=> $user["email"],
								   	"created_at"=> $user["created_at"],
								   	"level"		=> $user["level"],
								   	"actions"	=> $this->edit_user_url($user["id"])
								   ];
				}
				else {
					$refined_users[] = [
									"id" 		=> $user["id"],
									"name"		=> $this->add_user_url($user["id"], $user["name"]),
								   	"email"		=> $user["email"],
								   	"created_at"=> $user["created_at"],
								   	"level"		=> $user["level"],
								   	"actions"	=> $this->edit_user_url($user["id"]) . " " . $this->remove_user_url($user["id"])
								   ];	
				}
			}
		}

		// for normal user table
		else if($current_user_level == 1) {
			// table head setting
			$this->table->set_heading("ID", "Name", "Email", "Created at", "User Level");

			foreach($users as $user) {

				if($user["level"] == 9) {
					$user["level"] = "admin";
				}
				else if($user["level"] == 1) {
					$user["level"] = "normal";
				}

				$refined_users[] = [
									"id" 		=> $user["id"],
									"name"		=> $this->add_user_url($user["id"], $user["name"]),
								   	"email"		=> $user["email"],
								   	"created_at"=> $user["created_at"],
								   	"level"		=> $user["level"]
								   ];
			}
		}		
		return $this->table->generate($refined_users);
	}

	private function dashboard_title() {
		if($this->current_user_level == 9) {
			return "Mange Users";
		}
		else if($this->current_user_level == 1) {
			return "All Users";
		}
	}

	private function add_user_button() {
		if($this->current_user_level == 9) {
			return "<div class='text-right'>
					<a href='/users/new'><button class='btn btn-primary'>Add User</button></a>
				  </div>";
		}
	}

	private function add_user_url($user_id, $user_name) {
		return "<a href='/users/show/$user_id'>$user_name</a>";
	}

	private function edit_user_url($user_id) {
		return "<a href='/users/edit/$user_id'><button class='btn btn-warning'>edit</button></a>";
	}

	private function remove_user_url($user_id) {
		return "<a href='/users/remove/$user_id'><button class='btn btn-danger'>remove</button></a>";
	}
}