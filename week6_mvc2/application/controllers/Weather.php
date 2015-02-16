<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Weather extends CI_Controller {

	public function index()
	{
		$this->load->view("/weather/index");
	}

	public function ajax()
	{
		if($this->input->post("city") != "none") {
			$city = $this->input->post("city");
			$url = "http://api.openweathermap.org/data/2.5/weather?q=" . $city;
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$data = curl_exec($ch);
			echo $data;
		}
		else {
			redirect("/weather");
		}
	}
}

?>