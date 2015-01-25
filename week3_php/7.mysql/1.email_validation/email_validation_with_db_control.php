<?php
	session_start();

	// db connect
	require("email_validation_with_db_connect.php");

	// check form is submitted
	if(isset($_POST["action"]) && $_POST["action"] == "insert_email") {

		// empty array to collect validation errors
		$errors = array();
		$email = $_POST["email"];
		$get_emails = "select email from emails";
		$all_emails = fetch_all($get_emails);
		
		// check email validation
		if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
			$errors[] = "The email address you entered $email is NOT a valid email address!";
		}

		// check email already exists?
		foreach($all_emails as $element) {
			if(in_array($email, $element)) {
				$errors[] = "You already saved your email on the list.";
				break;
			}
		}
	}

	if(count($errors) > 0) {
		$_SESSION["errors"] = $errors;
		header("location: index.php");
		die();
	}

	else {
		$_SESSION["success"] = "The email you entered $email is a VALID email address! Thank you!";
		$add_email = "insert into emails (email, create_at, edit_at) values('$email', now(), now())";
		run_mysql_query($add_email);
		header("location: email_validation_with_db_success.php");
		die();
	}
?>
