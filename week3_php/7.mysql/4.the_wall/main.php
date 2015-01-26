<?php
	session_start();
	require("db_connect.php");
	

	// block malicious access to main.php
	if(!isset($_SESSION["user_email"])) {
		header("location: index.php");
		die();
	}

	include("header.php");
	include("header_login.php");


	function show_posts($session) {
		$email = $session["user_email"];
		$query_messages ="SELECT messages.id, messages.message, messages.created_at, messages.updated_at, users.first_name, users.last_name
						FROM users 
						JOIN messages ON users.id = messages.user_id
						WHERE users.email = '$email'";
		$messages = fetch_all($query_messages);

		for($i = count($messages) -1; $i >= 0; $i--) {
			// get message unique id in order to put it on the form action value
			$message_id = $messages[$i]["id"];
			echo "<div class='message-box'>
					<p>
						{$messages[$i]['first_name']} {$messages[$i]['last_name']} - {$messages[$i]['created_at']}
					</p>
					<p>
						{$messages[$i]['message']}
					</p>
				  </div>";

			show_comments($message_id);

			echo "<h4>Post a comment</h4>	
				<form action='post_process.php' method='post'>
					<input type='hidden' name='action' value='" . $message_id ."'>
					<div class='form-group'>
						<textarea name='comment' rows='3' class='form-control'></textarea>
					</div>
					<div class='text-right'>
						<button type='submit' name='post' class='btn btn-success'>Post a comment</button>
					</div>
				</form>";
		}
	}

	function show_comments($message_id) {
		$query_comments = "SELECT comments.comment, comments.created_at, users.first_name, users.last_name
						FROM comments
						JOIN messages ON messages.id = comments.message_id
						JOIN users ON users.id = comments.user_id
						WHERE messages.id = '$message_id'";
		$comments = fetch_all($query_comments);

		// var_dump($comments);
		foreach($comments as $comment) {
			echo "<div class='comment-box'>
					<p>
						{$comment['first_name']} {$comment['last_name']} - {$comment['created_at']} <br />
						{$comment['comment']}
					</p>
				</div>";
		}
	}
?>

<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-8">
				<h3>Post a message</h3>
				<form action="post_process.php" method="post">
					<input type="hidden" name="action" value="message_post">
					<div class="form-group">
						<textarea name="message" rows="5" cols="10" maxlength="1000" placeholder="Leave a message!" class="form-control"></textarea>
					</div>
					<div class="text-right">
						<button type="submit" name="post" class="btn btn-primary">Post a message</button>
					</div>
				</form>


<?php
	show_posts($_SESSION);
?>
			</div>
		</div>
	</div>
</section>


<?php
	include("footer.php");
?>