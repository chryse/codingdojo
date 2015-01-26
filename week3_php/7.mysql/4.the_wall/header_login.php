<?php

	$message = "";

	if(isset($_SESSION["success_register"])) {
		// echo "{$_SESSION['success_register']}";
		// echo "<br />";
		// echo "Welcome, {$_SESSION['user_name']}";
		// echo "<br />";
		// echo "Your ID is {$_SESSION['user_email']}.";
		$message = message_register($_SESSION);
		// echo $message;
	}
	
	else if(isset($_SESSION["success_login"])) {
		// echo "{$_SESSION['success_login']}";
		// echo "<br />";
		// echo "Welcome, {$_SESSION['user_name']}";
		// echo "<br />";
		// echo "Your ID is {$_SESSION['user_email']}.";
		$message = message_login($_SESSION);
		// echo $message;
	}

	// kick out malicious access without login or register
	else {
		// header("location: index.php");
		// die();
	}

	function message_register($session) {
		$message = "Welcome " . $session["user_name"];
		return $message;
	}

	function message_login($session) {
		$message = $session["user_name"];
		return $message;
	}
?>
<nav class="navbar navbar-fixed-top navbar-inverse">
	<div class="container">
		<div class="navbar-header">
			<a class="navbar-brand">The Wall</a>
		</div>
		<div class="navbar-right">
			<ul class="nav navbar-nav">
				<li><a>Welcome <?= $message; ?></a></li>
				<li><a href="login_process.php">log out</a></li>
			</ul>

		</div>
	</div>
</nav>