<?php
	session_start();

	if(isset($_SESSION["success_register"])) {
		echo "{$_SESSION['success_register']}";
		echo "<br />";
		echo "Welcome, {$_SESSION['user_name']}";
		echo "<br />";
		echo "Your ID is {$_SESSION['user_email']}.";
		unset($_SESSION["success_register"]);
	}
	
	if(isset($_SESSION["success_login"])) {
		echo "{$_SESSION['success_login']}";
		echo "<br />";
		echo "Welcome, {$_SESSION['user_name']}";
		echo "<br />";
		echo "Your ID is {$_SESSION['user_email']}.";
		unset($_SESSION["success_login"]);
	}
?>

<h1>
<a href="login_control.php">Log out</a>
</h1>