<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Friends extends CI_Controller {

	private $view_data = [];

	public function __construct()
	{
		parent::__construct();
		// $this->output->enable_profiler();
		$this->load->model("User");
	}

	public function index()
	{
		// var_dump($this->session->userdata("user"));

		// login check
		if(!$this->session->userdata("user")["is_logged_in"]) {
			redirect("/");	
		}

		// get friends list
		$this->view_data["friends"] = $this->User->fetch_friends($this->session->userdata("user")["id"]);

		// get non friend list
		$this->view_data["non_friends"] = $this->User->fetch_non_friends($this->session->userdata("user")["id"]);

		// var_dump($this->view_data["friends"]);

		$this->view_data["user"] = $this->session->userdata("user");
		$this->load->view("friends_main", $this->view_data);
	}

	public function user()
	{
		$user = $this->User->fetch_user_by_id($this->uri->segment(2));
		$this->view_data["user"] = $user;
		$this->load->view("user_detail", $this->view_data);
	}

	public function delete()
	{
		$user_id = $this->session->userdata("user")["id"];
		$friend_id = $this->input->post("friend_id");
		// echo $friend_id;
		// echo $user_id;
		// die();

		$this->User->delete_friendship($user_id, $friend_id);
		$this->view_data["non_friends"] = $this->User->fetch_non_friends($this->session->userdata("user")["id"]);
		// var_dump($this->view_data["non_friends"]);

		redirect("/friends");

		// ajax purpose
		// $this->load->view("non_friends_list", $this->view_data);
	}

	public function add()
	{
		$user_id = $this->session->userdata("user")["id"];
		$friend_id = $this->input->post("non_friend_id");

		$this->User->add_friendship($user_id, $friend_id);
		$this->view_data["friends"] = $this->User->fetch_friends($this->session->userdata("user")["id"]);

		redirect("/friends");

		// ajax purpose
		// $this->load->view("friends_list", $this->view_data);
		
	}

}
