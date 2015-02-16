<?php
defined("BASEPATH") OR exit("No direct script access allowed.");

class Notes extends CI_Controller {

	private $view_data = [];

	public function __construct()
	{
		parent::__construct();
		// $this->output->enable_profiler();
	}

	public function index()
	{
		$this->load->model("Post");
		$this->view_data["messages"] = $this->Post->get_all_posts();

		$this->load->view("/notes/index", $this->view_data);	
	}

	public function create()
	{
		// var_dump($this->input->post());
		$this->load->model("Post");
		$post = $this->input->post("message");

		if($post != null) {
			// add message into db
			$added_message = $this->Post->add_post($post);
			// $added_message = true;
			if($added_message) {
				// seconde approach
				echo $post;

				// first approach
				// $data = $this->Post->get_all_posts();
				// echo "<pre>";
				// var_dump($data);
				// echo "</pre>";
			}
			
			// echo json_encode($data);
		}
		// else {
		// 	redirect("/notes");
		// }
	}
}
?>
