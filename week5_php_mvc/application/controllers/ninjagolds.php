 <?php
defined("BASEPATH") OR exit("No direct script access allowed");

class NinjaGolds extends CI_Controller {

	public function index()
	{
		$data = [];

		// check total gold is set
		if(!$this->session->has_userdata("total_gold")) {
			$this->session->set_userdata("total_gold", 0);
		}

		// check activities are set
		if(!$this->session->has_userdata("activities")) {
			$this->session->set_userdata("activities", []);
		}

		$activities = "";
		$word_pattern = "/earned/";
		$act_messages = $this->session->userdata("activities");

		// insert green and red colors depeding on activity message
		for($i = count($act_messages) -1; $i >= 0; $i--) {
			if(preg_match($word_pattern, $act_messages[$i])) {
				$activities .= "<span class='green'>{$act_messages[$i]}</span><br />";
			}
			else {
				$activities .= "<span class='red'>{$act_messages[$i]}</span><br />";
			}			
		}

		$data["total_gold"] = $this->session->userdata("total_gold");
		$data["activities"] = $activities;

		$this->load->view("ninja-gold", $data);
	}

	public function gold_process()
	{
		$place = $this->input->post("selection");
		
		if($place == "farm") {
			$gold = rand(10, 20);
		}
		else if($place == "cave") {
			$gold = rand(5, 10);
		}
		else if($place == "house") {
			$gold = rand(2, 5);
		}
		else if($place == "casino") {
			$posibility = rand(1, 100);
			if($posibility <= 70) {
				$gold = rand(-50, 0);
			}
			else {
				$gold = rand(0, 50);	
			}
		}

		$previous_gold = $this->session->userdata("total_gold");
		$this->session->set_userdata("total_gold", $previous_gold+$gold);

		// appendind data into existing session activities
		$activities = $this->session->userdata("activities");

		if($gold > 0) {
			$activities[] = "You entered a " . $place
							. " and earned $gold golds. " . date("F d Y g:i A");
		}
		else {
			$gold *= (-1);
			$activities[] = "You entered a " . $place 
							. " and lost $gold golds... Ouch... " . date("F d Y g:i A");
		}
		
		$this->session->set_userdata("activities", $activities);

		redirect("ninjagold");
	}

	public function reset() {
		$this->session->set_userdata("total_gold", 0);
		$this->session->set_userdata("activities", []);
		redirect("ninjagold");
	}
}
?>