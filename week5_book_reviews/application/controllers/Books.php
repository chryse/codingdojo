<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Books extends CI_Controller {

	private $view_data = [];

	public function __construct()
	{
		parent::__construct();
		// $this->output->enable_profiler();
		$this->load->model("Book");
		$this->load->library("form_validation");
	}

	public function index()
	{
		// login check
		if(!$this->session->userdata("user")["is_logged_in"]) {
			redirect("/");	
		}
		else {
			$this->view_data["name"] = $this->session->userdata("user")["name"];
			$this->view_data["page_title"] = "Welcome " . $this->view_data["name"];
		}

		// main view
		if($this->uri->segment(2) == NULL) {
			$this->view_data["books"] = $this->Book->fetch_all_books();
			$this->load->view('book_list', $this->view_data);
		}
		else {
			$this->view_data["books"] = $this->Book->fetch_book_info_by_id($this->uri->segment(2));
			$this->view_data["page_title"] = $this->view_data["books"][0]["title"];
			$this->load->view('book_detail', $this->view_data);
		}

		
	}

	// book add with review page
	public function add()
	{
		$this->view_data["page_title"] = "Add a new book";
		$this->load->view("add", $this->view_data);
	}

	// book add process page
	public function add_process()
	{
		$post = $this->input->post();
		// validation rules
		$validation_rules = [
								[
								 "field" => "title",
								 "label" => "Title",
								 "rules" => "trim|required",
								 "errors"=> [
								 			 "required" => "%s can't be blank."
								 			]
								]
							];

		$this->form_validation->set_rules($validation_rules);

		// validation fails
		if($this->form_validation->run() == false) {
			$this->session->set_flashdata("add_errors", validation_errors());
			redirect("/books/add");
		}

		// validation success
		else {
			if($post["author"] == "") {
				$info["author"] = $post["author_option"];
			}
			else {
				$info["author"] = $post["author"];
			}

			$info["title"] = $post["title"];
			$info["user_id"] = $this->session->userdata("user")["id"];
			$info["book_id"] = $this->Book->insert_book_info($info);
			$info["review"] = $post["review"];
			$info["rating"] = $post["rating"];

			if($this->Book->insert_review($info)) {
				// $this->session->set_userdata("book_info", $info["book_id"]);
				redirect("/books/{$info['book_id']}");
			}

			else {
				$this->session->set_flashdata("add_errors", "insertion error.");
				redirect("/books/add");
			}
		}		
	}

	public function add_review()
	{
		echo "hello";
		// var_dump($this->input->post());
	}

	public function delete()
	{
		$book_id = $this->input->post("book_id");
		$user_id = $this->input->post("user_id");
		$this->Book->delete_review($book_id, $user_id);
		$this->view_data["books"] = $this->Book->fetch_book_info_by_id($book_id);
		$this->load->view("review_list", $this->view_data);
	}
}
