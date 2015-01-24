<?php
	session_start();

	if(isset($_POST["farm"])) {
		$gold = rand(10, 20);
		$place = "farm";
	}
	else if(isset($_POST["cave"])) {
		$gold = rand(5, 10);
		$place = "cave";
	}
	else if(isset($_POST["house"])) {
		$gold = rand(2, 5);
		$place = "house";
	}
	else if(isset($_POST["casino"])) {
		$posibility = rand(1, 100) /100 * 100;
		if($posibility <= 70) {
			$gold = rand(-50, 0);
		}
		else {
			$gold = rand(0, 50);	
		}
		$place = "casino";
	}

	$_SESSION["total_gold"] += $gold;
	$_SESSION["place"] = $place;
	if($gold > 0) {
		$_SESSION["activities"][] = "<span class='green'>You entered a " . $place
									. "and earned $gold golds. " . date("F d Y g:i A") . "</span>";									
	}
	else {
		$gold *= (-1);
		$_SESSION["activities"][] = "<span class='red'>You entered a " . $place 
									. "and lost $gold golds... Ouch... " . date("F d Y g:i A") . "</span>";
	}
	

	header("location: ninja_gold_game.php");
	die();
?>