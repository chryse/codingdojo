<?php
	session_start();
	require("db_connect.php");
	require("helper.php");

	// block malicious access to main.php
	if(!isset($_SESSION["user_email"])) {
		header("location: index.php");
		die();
	}

	// move to other user's page
	if(isset($_GET["id"])) {
		$_SESSION["current_user_page"] = $_GET["id"];
	}


	include("header.php");
	include("header_login.php");


	// show posts on main
	function show_posts($session) {

		// check user move to other's page

		$user_id = $session["current_user_page"];
		$query_user_email = "SELECT users.email
							FROM users
							WHERE users.id = '$user_id'";
		$user_email = fetch_all($query_user_email);
		$email = $user_email[0]["email"];
		
		$query_messages ="SELECT messages.id, messages.message, messages.updated_at, users.first_name, users.last_name,
								 DATE_FORMAT(messages.created_at,'%b %d %Y %h:%i %p') as created_at,
								 UNIX_TIMESTAMP(messages.created_at) as unix_timestamp
						FROM users 
						JOIN messages ON users.id = messages.user_id
						WHERE users.email = '$email'
						ORDER BY created_at DESC";

		$messages = fetch_all($query_messages);

		foreach($messages as $message) {
			// get message unique id in order to put it on the form action value
			$message_id = $message["id"];
			$message_first_name = $message["first_name"];
			$message_last_name = $message["last_name"];
			$message_created_at = $message["created_at"];
			$message_message = $message["message"];
			$message_unix_timestamp = $message["unix_timestamp"];

			$delete = "";

			// if current_user page is logged in user, put delete icon
			// and if within 30 minutes removing is possible
			if(get_user_id($session["user_email"]) == $session["current_user_page"]
				&& (time() - $message_unix_timestamp) <= 1800) {
				// delete post
				$delete = "<form method='post' action='post_process.php' class='text-right'>
							<input type='hidden' name='action' value='message_delete'>
							<input type='hidden' name='id' value='$message_id'>
							<button type='submit' class='btn btn-default'><i class='fa fa-trash-o'></i></button>
						</form>";
			}

			echo "<div class='message-box'>
					<p>
						$message_first_name $message_last_name <span class='date'>$message_created_at</span>
					</p>
					<p>
						$message_message
					</p>
						$delete
				  </div>";

			// display comments on each message
			show_comments($message_id);

			echo "<h4 class='comment-box'>Post a comment</h4>	
				<form action='post_process.php' method='post' class='comment-box'>
					<input type='hidden' name='action' value='comment_post'>
					<input type='hidden' name='id' value='$message_id'>
					<div class='form-group'>
						<textarea name='comment' rows='3' class='form-control' placeholder='Write your comment here!!!'></textarea>
					</div>
					<div class='text-right'>
						<button type='submit' name='post' class='btn btn-success'>Post a comment</button>
					</div>
				</form>";
		}
	}

	// show comments
	function show_comments($message_id) {
		$query_comments = "SELECT comments.comment, comments.created_at, users.first_name, users.last_name
						FROM comments
						JOIN messages ON messages.id = comments.message_id
						JOIN users ON users.id = comments.user_id
						WHERE messages.id = '$message_id'
						ORDER BY comments.created_at ASC";
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

	// show users on the side
	function show_users($session) {
		$user_email = $session["user_email"];
		$query_users = "SELECT *
						FROM users
						WHERE users.email != '$user_email'";
		$users = fetch_all($query_users);

		foreach($users as $user) {
			echo "<div class='user-box'>
					<p>
						<a href='main.php?id={$user['id']}'>
							{$user['first_name']} {$user['last_name']}
						</a><br/>
						{$user['email']}
					</p>
				</div>";
		}
	}

	//show logged in user on the side
	function show_me($session) {
		$user_email = $session["user_email"];
		$query_users = "SELECT *
						FROM users
						WHERE users.email = '$user_email'";
		$users = fetch_all($query_users);

		foreach($users as $user) {
			echo "<div class='user-box'>
					<p>
						<a href='main.php?id={$user['id']}'>
							{$user['first_name']} {$user['last_name']}
						</a><br />
						{$user['email']}
					</p>
				</div>";
		}
	}

?>

<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-9">
			
			<?php
				// only login user can write his or her posts
				if(get_user_id($_SESSION["user_email"]) == $_SESSION["current_user_page"]) {
					echo "<h2>{$_SESSION['user_name']}'s Page</h2>";
			?>
				<h3>Post a message</h3>
				<form action="post_process.php" method="post">
					<input type="hidden" name="action" value="message_post">
					<div class="form-group">
						<textarea name="message" rows="5" cols="10" placeholder="Leave a message!" class="form-control"></textarea>
					</div>
					<div class="text-right">
						<button type="submit" name="post" class="btn btn-primary">Post a message</button>
					</div>
				</form>
			<?php
				}
				// show the other user's name
				else {
					$current_user_id = $_SESSION["current_user_page"];
					$query_user_name = "SELECT users.first_name, users.last_name
										FROM users
										WHERE users.id = '$current_user_id'";
					$user_name = fetch_all($query_user_name);
					echo "<h2>{$user_name[0]['first_name']} {$user_name[0]['last_name']}'s Page</h2>";
				}
			?>

				<!-- Display messages and comments -->
				<?= show_posts($_SESSION, $_GET); ?>

			</div>
			<div class="col-sm-3">
				<h3>It's me.</h3>
				<!-- Display me -->
				<?= show_me($_SESSION); ?>

				<h3>Users</h3>
				
				<!-- Display users -->
				<?= show_users($_SESSION); ?>

			</div>
		</div>
	</div>
</section>


<?php
	include("footer.php");
?>