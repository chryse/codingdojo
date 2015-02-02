<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Course extends CI_Model {

	// courses db property
	private $courses_db;

	// connecting courses_db database, this db is not defaul database
	public function __construct() {
		parent::__construct();
		$this->courses_db = $this->load->database("courses_db", true);
	}

	// get all data from courses table
	public function get_all_courses()
	{
		return $this->courses_db->query("SELECT title, description, DATE_FORMAT(created_at, '%b %d %Y %h:%i %p') as created_at, id FROM courses ORDER BY id DESC")->result_array();
	}

	// get course by id
	public function get_course_by_id($course_id)
	{
		return $this->courses_db->query("SELECT title, description FROM courses WHERE id = ?", array($course_id))->row_array();
	}

	// add course into courses table
	public function add_course($course)
	{

		$query = "INSERT INTO courses (title, description, created_at, updated_at) VALUES (?, ?, ?, ?)";
		$values = array($course["title"], $course["description"], date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s"));
		return $this->courses_db->query($query, $values);
	}

	// remove course from courses table
	public function remove_course($id)
	{
		$query = "DELETE FROM courses WHERE id = ?";
		$id = $id;
		return $this->courses_db->query($query, $id);
	}
}


?>