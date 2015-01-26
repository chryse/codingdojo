<?php
	session_start();
	require_once("db_connect.php");
	require_once("helper.php");

	if(isset($_POST["action"]) && $_POST["action"] == "message_post") {
		message_post($_POST, $_SESSION);
	}

	else if(isset($_POST["action"]) && $_POST["action"] == "comment_post") {
		comment_post($_POST, $_SESSION);
	}

	else if(isset($_POST["action"]) && isset($_POST["action"]) == "message_delete") {
		delete_post($_POST, $_SESSION);
	}

	else {
		header("location: main.php");
		die();
	}
	
	// post a message
	function message_post($post, $session) {

		if(!empty($post["message"])) {

			if(isset($session["current_user_page"])) {
				$current_user_page = $session["current_user_page"];
			}
			else {
				$current_user_page = get_user_id($session["user_email"]);
			}

			$user_id = escape_this_string(get_user_id($session["user_email"]));
			$message = escape_this_string($post["message"]);
			
			$query_message_post = "INSERT INTO messages (user_id, message, created_at, updated_at)
									VALUES('$user_id', '$message', now(), now())";
			
			run_mysql_query($query_message_post);

			// var_dump($query_message_post);
			
		}

		header("location: main.php?id=" . $session["current_user_page"]);
		die();
	}

	// post a comment
	function comment_post($post, $session) {

		// var_dump($post);

		if(!empty($post["comment"])) {
			$message_id = escape_this_string($post["id"]);
			$user_id = escape_this_string(get_user_id($_SESSION["user_email"]));
			$comment = escape_this_string($post["comment"]);

			$query_comment_post = "INSERT INTO comments (user_id, message_id, comment, created_at, updated_at)
									VALUES('$user_id', '$message_id', '$comment', now(), now())";
			
			run_mysql_query($query_comment_post);

			// var_dump($query_comment_post);
		}

		header("location: main.php?id=" . $session["current_user_page"]);
		die();
		
	}

	// delete post
	function delete_post($post, $session) {
		$message_id = $post["id"];
		$user_id = get_user_id($_SESSION["user_email"]);

		$query_delete_comments = "DELETE comments FROM comments
								WHERE comments.message_id = '$message_id'";

		run_mysql_query($query_delete_comments);

		$query_delete_post = "DELETE messages FROM messages
							WHERE messages.id = '$message_id'";

		run_mysql_query($query_delete_post);
		// $query_delete_post = "DELETE messages FROM messages
		// 					LEFT JOIN comments
		// 					ON comments.message_id = messages.id
		// 					WHERE messages.id = '$message_id'";

		// run_mysql_query($query_delete_post);

		header("location: main.php?id" . $session["current_user_page"]);
		die();
	}

?>