<?php
defined("BASEPATH") OR exit("No direct script access allowed.");

class Notes2 extends CI_Controller {

	private $view_data = [];

	public function __construct()
	{
		parent::__construct();
		$this->load->model("Note");
		// $this->output->enable_profiler();
	}

	public function index()
	{
		$this->view_data["notes"] = $this->Note->get_all_notes();
		$this->load->view("/notes2/index", $this->view_data);
	}

	public function add()
	{
		$note = [];
		$note["title"] = $this->input->post("title");
		$note["description"] = $this->input->post("description");
		$this->Note->add_note($note);
		$this->retrieve_page();
	}

	public function edit()
	{
		$note = [];
		$note["id"] = $this->input->post("id");
		$note["description"] = $this->input->post("description");
		$this->Note->edit_note($note);
		$this->retrieve_page();
	}

	public function delete()
	{
		$id = $this->input->post("id");
		$this->Note->delete_note($id);
		$this->retrieve_page();	
	}

	private function retrieve_page()
	{
		$this->view_data["notes"] = $this->Note->get_all_notes();
		$this->load->view("/notes2/partial", $this->view_data);
	}
}

?>