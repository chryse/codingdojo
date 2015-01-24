<?php
	session_start();

	if(isset($_POST["guess_number"])
		&& !empty($_POST["guess_number"])
		&& is_numeric($_POST["guess_number"])
		&& $_POST["guess_number"] >= 1
		&& $_POST["guess_number"] <= 100
		&& $_SESSION["remaining_guess"] > 0) {

		// when guess number is correct
		if($_POST["guess_number"] == $_SESSION["correct_number"]) {
			// echo "You are correct<br/>";
			$_SESSION["result"] = "correct";
	        $_SESSION["message"] = "";
		}

		// when guess number is greater than right number
		else if($_POST["guess_number"] > $_SESSION["correct_number"]) {
			// echo "Put a lower number.<br />";
			$_SESSION["message"] = "";
			$_SESSION["result"] = "high";
			$_SESSION["remaining_guess"]--;
		}

		// when guess number is less than right number
		else if($_POST["guess_number"] < $_SESSION["correct_number"]) {
			// echo "Put a higher number.<br />";
			$_SESSION["message"] = "";
			$_SESSION["result"] = "low";
			$_SESSION["remaining_guess"]--;
		}
		else {
			$_SESSION["message"] = "Please Type Correct Number.";
			// echo "Please enter correct number<br />";
			$_SESSION["result"] = "";
		}
	}

	else {
		$_SESSION["message"] = "Please Type Correct Number.";
		$_SESSION["result"] = "";
	}

	// When remaining guess is zero
	if($_SESSION["remaining_guess"] == 0) {
			$_SESSION["result"] = "correct";
	        $_SESSION["message"] = "";
	        $_SESSION["remaining_guess"] = ceil(log(100, 2));
	} 

	header("location: great_number_game.php");
	die();
?>