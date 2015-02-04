<?php
defined("BASEPATH") OR exit("No direct script access allowed.");

class Messages extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->output->enable_profiler();

		// sign in check
		if(!$this->session->userdata("user")["is_logged_in"]) {
			redirect("/signin");
		}
		else {
			// load data Message model
			$this->load->model("Message");

			// data for view page
			$this->view_data["is_logged_in"] = $this->session->userdata("user")["is_logged_in"];
		}
		
	}

	public function index()
	{
		redirect("/dashboard");
	}

	public function add_message()
	{
		if($this->input->post("submit") && $this->input->post("message") != null) {
			$message = [];
			$message["user_written_id"] = $this->input->post("user_written");
			$message["user_writer_id"] = $this->session->userdata("user")["id"];
			$message["message"] = $this->input->post("message");
			
			// insert message to db
			$this->Message->add_message($message);
		}
		
		redirect($this->input->post("submit"));
	}

	public function add_comment()
	{
		if($this->input->post("submit") && $this->input->post("comment") != null) {
			$comment = [];
			$comment["user_writer_id"] = $this->session->userdata("user")["id"];
			$comment["message_id"] = $this->input->post("message_id");
			$comment["comment"] = $this->input->post("comment");
			
			// insert comment to db
			$this->Message->add_comment($comment);
		}

		redirect($this->input->post("submit"));
	}

}

?>