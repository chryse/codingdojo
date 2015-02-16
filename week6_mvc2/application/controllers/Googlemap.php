<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Googlemap extends CI_Controller {

	public function index()
	{
		$this->load->view("/googlemap/index");
	}

	public function ajax()
	{
		
		if($this->input->get("from") && $this->input->get("to")) {

			$from = $this->input->get("from");
			$to = $this->input->get("to");

			$url = "https://maps.googleapis.com/maps/api/directions/json?origin=" . urlencode($from) . "&destination=" . urlencode($to) . "&key=AIzaSyBfVEydUVc66dd-rqnzz74KOVYx8-roeYk";
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$data = curl_exec($ch);
			echo $data;
			// $html = file_get_contents($url);

			// $this->output->set_content_type("application/json")->set_output($html);
		}
	}
}

?>