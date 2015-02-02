<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surveys extends CI_Controller {

	public function index()
	{
		$this->load->view("survey-form");
	}

	public function survey_process() {
		if($this->session->userdata("counter")) {
			$counter = $this->session->userdata("counter");
			$this->session->set_userdata("counter", $counter +1);	
		}
		else {
			$this->session->set_userdata("counter", 1);
		}

		$this->session->set_userdata("name", $this->input->post("name"));
		$this->session->set_userdata("location", $this->input->post("location"));
		$this->session->set_userdata("language", $this->input->post("language"));
		$this->session->set_userdata("comment", $this->input->post("comment"));

		$data = $this->input->post();

		redirect("survey-result");
	}

	public function result() {

		$data["counter"] = $this->session->userdata("counter");
		$data["name"] = $this->session->userdata("name");
		$data["location"] = $this->session->userdata("location");
		$data["language"] = $this->session->userdata("language");
		$data["comment"] = $this->session->userdata("comment");
		$this->load->view("survey-result", $data);

	}
}
