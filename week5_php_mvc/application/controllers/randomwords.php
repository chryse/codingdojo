<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RandomWords extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->output->enable_profiler();
	}

	public function index()
	{

		$data = [];

		if($this->session->has_userdata("attempt")) {
			// echo "attempt set";
			$data["attempt"] = $this->session->userdata["attempt"];	
		}
		else {
			// echo "attempt not set";
			$data["attempt"] = 0;
		}

		if($this->session->has_userdata("rand_word")) {
			// echo $this->session->userdata["rand_word"];
			$data["rand_word"] = $this->session->userdata["rand_word"];
		}
		else {
			// echo "rand word not set";
			$data["rand_word"] = "";
		}

		$this->load->view("random-word", $data);
	}

	public function generate()
	{
		$pool = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$result = "";
		
		for($i = 0; $i < 16; $i++) {
			$result .= $pool[rand(0, strlen($pool)-1)];
		}

		// random word set
		$this->session->set_userdata("rand_word", $result);

		// attempt number set
		$count = $this->session->userdata("attempt");
		$this->session->set_userdata("attempt", $count+1);

		redirect("randomword");
	}
}


?>