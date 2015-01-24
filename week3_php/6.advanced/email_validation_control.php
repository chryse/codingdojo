<?php
	session_start();

	// check form is submitted
	if(isset($_POST["action"]) && $_POST["action"] == "login") {

		//empty array to collect validation errors
		$errors = array();

		// check email field
		if(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {	
			$_SESSION["email"] = $_POST["email"];
		}

		else {
			$errors[] = "The email address you entered " .
			$_POST["email"] . " is NOT a valid email address!";
		}
	}

	if(count($errors) > 0) {
		$_SESSION["errors"] = $errors;
		header("location: email_validation.php");
		die();
	}

	else {
		$_SESSION["success"] = "The email address you entered " .
		$_POST["email"] . " is a VALID email address! Thank you!";
		header("location: email_validation_success.php");
		die();
	}
?>