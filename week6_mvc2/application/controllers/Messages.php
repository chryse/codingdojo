<?php
defined("BASEPATH") OR exit("No direct script access allowed.");

class Messages extends CI_Controller {

	public function index()
	{
		$this->load->view("/message/index");
	}

	public function process()
	{
		$name = array("John", "Michael", "Joe", "Trey");
		$output = array("name" => $name[rand(0, count($name)-1)],
						"age"  => rand(18, 60)
						);
		echo json_encode($output);
	}
}
?>
