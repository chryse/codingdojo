<?php
	session_start();
	require_once("db_connect.php");

	if(isset($_POST["action"]) && $_POST["action"] == "message_post") {
		message_post($_POST);
	}

	else if(isset($_POST["action"])) {
		comment_post($_POST);
	}

	else {
		header("location: main.php");
		die();
	}
	
	// post a message
	function message_post($post) {

		// var_dump($post);

		if(!empty($post["message"])) {
			$user_id = get_user_id($_SESSION["user_email"]);
			$message = $post["message"];
			
			$query_message_post = "INSERT INTO messages (user_id, message, created_at, updated_at)
									VALUES('$user_id', '$message', now(), now())";
			
			run_mysql_query($query_message_post);

			// var_dump($query_message_post);
			
		}

		header("location: main.php");
		die();
	}

	// post a comment
	function comment_post($post) {

		// var_dump($post);

		if(!empty($post["comment"])) {
			$message_id = $post["action"];
			$user_id = get_user_id($_SESSION["user_email"]);
			$comment = $post["comment"];

			$query_comment_post = "INSERT INTO comments (user_id, message_id, comment, created_at, updated_at)
									VALUES('$user_id', '$message_id', '$comment', now(), now())";
			
			run_mysql_query($query_comment_post);

			// var_dump($query_comment_post);
		}

		header("location: main.php");
		die();
		
	}

	// get user id
	function get_user_id($user_email) {
		$query = "SELECT users.id FROM users
				WHERE '$user_email' = users.email";
		$user_id = fetch_all($query)[0]["id"];
		return $user_id;
	}


?>