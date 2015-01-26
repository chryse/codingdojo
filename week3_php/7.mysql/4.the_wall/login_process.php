<?php
	session_start();
	require_once("db_connect.php");
	require_once("helper.php");

	if(isset($_POST["action"]) && $_POST["action"] == "login") {

		login_user($_POST);
	}

	else if(isset($_POST["action"]) && $_POST["action"] == "registration") {

		register_user($_POST);
	}

	// kick out malicious navigations or log off!
	else {
		session_destroy();
		header("location: index.php");
		die();
	}

	// login user
	function login_user($post) {
		$errors = [];

		// check if email field is empty
		if(empty($post["email"])) {
			$errors[] = "Please enter your email";
		}

		// check if password field is empty
		if(empty($post["password"])) {
			$errors[] = "Please enter your password";
		}

		// if there are errros, go back to index page and show error messages
		if(count($errors) > 0) {
			$_SESSION["errors"] = $errors;
			// var_dump($errors);
			header("location: index.php");
			die();
		}

		// if there is no error messages, validate a user
		else {
			$password = $post["password"];
			$email = $post["email"];
			$query = "SELECT users.id, users.first_name, users.last_name from users
					WHERE users.password = '$password'
					AND users.email = '$email'";
			$user = fetch_all($query);

			// if user is found, go to success page
			if(count($user) > 0) {
				$_SESSION["success_login"] = "User successfully logged in!";
				$_SESSION["user_email"] = $post["email"];
				// echo $user[0]["last_name"];
				$_SESSION["user_name"] = $user[0]["first_name"] . " " . $user[0]["last_name"];
				$_SESSION["current_user_page"] = $user[0]["id"];
				header("location: main.php");
				die();
			}

			// if user is not found, show login fails
			else {
				$errors = ["Login information is not correct. Please try again"];
				$_SESSION["errors"] = $errors;
				header("location: index.php");
				die();
			}
		}	
	}

	// register user
	function register_user($post) {
		$errors = [];
		$name_pattern = "/^[a-zA-Z\s]+$/";

// validation starts
///////////////////////////////////////////////////////////////////////////////////////

		// first name check, it's empty?
		if(empty($post["first_name"])) {
			$errors[] = "First name can't be blank!";
		}

		// first name check, it's a valid name?
		if(!preg_match($name_pattern, $_POST["first_name"])) {
			$errors[] = "Your first name includes wrong characters.";
		}

		// last name check, it's empty?
		if(empty($post["last_name"])) {
			$errors[] = "Last name can't be blank!";
		}

		// last name check, it's a valid name?
		if(!preg_match($name_pattern, $post["last_name"])) {
			$errors[] = "Your last name includes wrong characters.";
		}

		// email check
		if(!filter_var($post["email"], FILTER_VALIDATE_EMAIL)) {
			$errors[] = "Your email is invalid. Please try again.";
		}

		// check email already exists?
		if(filter_var($post["email"], FILTER_VALIDATE_EMAIL)) {
			$email = $post["email"];
			$get_email ="SELECT email FROM users WHERE users.email = '$email'";
			$user_email = fetch_all($get_email);

			foreach($user_email as $email_array) {
				if(in_array($email, $email_array)) {
					$errors[] = "The email entered is already registered.";
				}	
			}
		}

		// password check
		if(empty($post["password"])) {
			$errors[] = "Your password should be not empty.";
		}

		if(empty($post["confirm_password"]) || ($post["password"] != $post["confirm_password"])) {
			$errors[] = "Your confirm password does not match to your password.";
		}

// validation end
///////////////////////////////////////////////////////////////////////////////////////		


		if(count($errors) > 0) {
			$_SESSION["errors"] = $errors;
			header("location: index.php");
			die();
		}

		// success to register
		else {
			$first_name = $post["first_name"];
			$last_name = $post["last_name"];
			$password = $post["password"];
			$email = $post["email"];
			$query = "INSERT INTO users (first_name, last_name, password, email, created_at, updated_at)
						VALUES ('$first_name', '$last_name', '$password', '$email' , now(), now())";
			run_mysql_query($query);
			$_SESSION["success_register"] = "User successfully created!";
			$_SESSION["user_name"] = $post["first_name"] . " " . $post["last_name"];
			$_SESSION["user_email"] = $post["email"];
			$_SESSION["current_user_page"] = get_user_id($post["email"]);
			header("location: main.php");
			die();
		}
		
	}
?>