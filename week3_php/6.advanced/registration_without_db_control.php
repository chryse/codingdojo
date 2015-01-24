<?php
	session_start();

	// if(!preg_match($name_check_pattern, $_POST["last_name"])) {
	// 	echo "includes numbers";
	// }
	// else {
	// 	echo "does not include numbers.";
	// }

	if(isset($_POST["registration"]) && $_POST["registration"] == "registration") {

		$error_messages = [];
		$name_check_pattern = "/^[a-zA-Z\s]+$/";

		// email check
		if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
			$error_messages[] = "Your email is invalid. Please try again.";
		}

		// first name check, it's empty?
		if(empty($_POST["first_name"])) {
			$error_messages[] = "Please put your first name.";
		}
		
		// first name check, it's a valid name?
		if(!preg_match($name_check_pattern, $_POST["first_name"])) {
			$error_messages[] = "Your first name includes wrong characters.";
		}

		// last name check, it's empty?
		if(empty($_POST["last_name"])) {
			$error_messages[] = "Please put your last name.";
		}
		
		// last name check, it's a valid name?
		if(!preg_match($name_check_pattern, $_POST["last_name"])) {
			$error_messages[] = "Your last name includes wrong characters.";
		}

		// password check
		if(empty($_POST["password"]) || (strlen($_POST["password"]) <= 6)) {
			$error_messages[] = "Your password should be longer than 6 characters.";
		}

		if(empty($_POST["confirm_password"]) || ($_POST["password"] != $_POST["confirm_password"])) {
			$error_messages[] = "Your confirm password does not match to your password.";
		}

		// birth date check
		if(!checkdate($_POST["mon"], $_POST["day"], $_POST["year"])) {
			$error_messages[] = "Your birth date entered is not correct.";
		}
	}

	// error messages are more than 0 go to previous page and warn.
	if(count($error_messages) > 0) {
		$_SESSION["error_messages"] = $error_messages;
		header("location: registration_without_db.php");
		die();
	}
	// error is nothing go to success page
	else {
		header("location: registration_without_db_success.php");
		die();
	}
?>