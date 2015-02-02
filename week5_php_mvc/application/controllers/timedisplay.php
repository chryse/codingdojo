<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Timedisplay extends CI_Controller {

	public function index()
	{
		$this->load->helper('date');
		$now = gmt_to_local(time(), 'UM8');

		$datestring = "%M %d, %Y<br />%h:%i %a";

		$now_date = mdate($datestring, $now);

		$this->session->set_userdata("date", $now_date);

		$this->load->view("time-display", array("now" => $this->session->userdata("date")));
	}
}
