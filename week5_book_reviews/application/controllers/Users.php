<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	private $view_data = [];

	public function __construct()
	{
		parent::__construct();
		// $this->output->enable_profiler();
		$this->load->model("User");
	}

	public function index()
	{
		if($this->uri->segment(2)) {
			$this->view_data["user"] = $this->User->fetch_user_by_id($this->uri->segment(2));
			$this->view_data["total_review"] = $this->User->fetch_user_review_count($this->uri->segment(2));
			$this->view_data["reviewed_books"] = $this->User->fetch_user_reviewed_books($this->uri->segment(2));
			$this->load->view('users', $this->view_data);	
		}
		else {
			redirect("/books");
		}
		
	}

}
