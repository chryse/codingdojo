<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Courses extends CI_Controller {

	public function __construct()
	{
		// whenever you make courses object, it loads model Course
		parent::__construct();
		$this->load->model("Course");
		// $this->output->enable_profiler(TRUE);
	}

	public function index()
	{
		$data = [];

		// output table for view page
		$data["result_table"] = $this->make_result_table();

		// error messages for view page
		$data["errors"] = $this->session->flashdata("errors");

		$this->load->view("course", $data);
	}

	public function course_process()
	{
		$errors = [];
		$title = $this->input->post("title");
		$description = $this->input->post("description");

		if(strlen($this->input->post("title")) < 15) {
			$errors[] = "Please type course title at least 15.";
		}

		// check errors and bring errror messages on course page		
		if(count($errors) > 0) {
			$this->session->set_flashdata("errors", $errors);
		}
		else {
			$data = $this->input->post();
			$this->add($data);
		}
		redirect("course");		
	}

	private function show_all()
	{
		return $this->Course->get_all_courses();
	}

	private function add($data)
	{
		return $this->Course->add_course($data);
	}

	public function destroy()
	{
		$data = [];

		// load url helper
		$this->load->helper('url');

		// select second segment from url
		$id = $this->uri->segment(2);
		
		$new_course = [];
		$course = $this->Course->get_course_by_id($id);
		$course_keys = array_keys($course);

		for($i = 0; $i < count($course); $i++) {
			$new_course[] = $course_keys[$i];
			$new_course[] = $course[$course_keys[$i]];
		}

		// var_dump($new_course);

		// load table class in order to draw table and set it
		$this->load->library("table");
		$templ = array("table_open" => "<table class='table table-striped table-hover'>");
		$this->table->set_template($templ);

		$data["course"] = $this->table->generate($this->table->make_columns($new_course, 2));

		$this->load->view("course-destroy", $data);
		
		if($this->input->post("submit") === "delete" ) {
			$this->destroy_process($id);
			redirect("course");
		}
	}

	// excute destory course record
	private function destroy_process($id)
	{
		// delete course row
		$this->Course->remove_course($id);
	}

	private function make_result_table()
	{
		$new_courses = [];

		$courses = $this->show_all();
		foreach($courses as $course) {
			$course_id = $course["id"];
			$course["id"] = "<a href='course-destroy/{$course['id']}'>remove</a>";
			$new_courses[] = $course;
		}
		
		// load table class in order to draw table
		$this->load->library("table");

		//change table style
		$templ = array("table_open" => "<table class='table table-striped table-hover'>");
		$this->table->set_template($templ);

		// table head setting
		$this->table->set_heading("Title", "Description", "Date Added", "Action");

		// generate table

		return $this->table->generate($new_courses);
	}

}
?>