<?php

session_start();

require("connection.php");

// var_dump($_POST["action"]);
// var_dump(isset($_POST));
if(isset($_POST["action"]) && $_POST["action"] == "action") {

	$errors = [];
	$pattern = "/^[a-zA-Z\s]+$/";

	// post
	if(isset($_POST["put_quote"])) {

		// check name is correct input
		if(empty($_POST["name"]) || !preg_match($pattern, $_POST["name"])) {
			$errors[] = "Please type your name correctly.";
		}

		// check there is qutoes on the textarea
		if(empty($_POST["quote"])) {
			$errors[] = "You did not quote at all, please comment something.";
		}
	}

	// skip quoting, redirect to main page
	else if(isset($_POST["skip_quote"])) {
		header("location: main.php");
		die();
	}	
}

// if there is errors
if(count($errors) > 0) {
	$_SESSION["errors"] = $errors;
	header("location: index.php");
	die();
}
// if there is no errors
else {
	$name = escape_this_string($_POST["name"]);
	$quote = escape_this_string($_POST["quote"]);

	$query = "insert into quotes (name, quote, create_at, update_at) values('$name', '$quote', now(), now())";
	run_mysql_query($query);
	header("location: main.php");
	die();
}

	
?>