<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Counters extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->output->enable_profiler();
	}

	public function index()
	{
		// see if the counter exists in the session
		if($this->session->userdata("_counter")) {
			$counter = $this->session->userdata("_counter");
			$this->session->set_userdata("_counter", $counter+1);
		}
		else {
			$this->session->set_userdata("_counter", 1);
		}

		$this->load->view("counter", array("counter" => $this->session->userdata("_counter")));
	}

	public function reset()
	{
		$this->session->set_userdata("_counter", 0);
		redirect("counter");
	}
}
