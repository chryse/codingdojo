<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Log in and Registration</title>
	<meta charset="utf-8">
	<style>
		* {
			font-family: helvetica, sans-serif;
		}
	</style>
</head>
<body>
	<h1>Log in and Registration</h1>
	<h2>Login</h2>
	<form method="post" action="login_control.php">
		<input name="action" type="hidden" value="login">
		<label>Email address:</label>
		<input name="email" type="email">
		<label>Password:</label>
		<input name"password" type="password">
		<input name="login" type="submit" value="Log In">
	</form>
	<h2>Registration</h2>
	<form method="post" action="login_control.php">
		<input name="action" type="hidden" value="registration">
		<label>First Name:</label>
		<input name="first_name" type="text">
		<label>Last Name:</label>
		<input name="last_name" type="text">
		<label>Password:</label>
		<input name="password" type="password">
		<label>Confirm Password</label>
		<input name="confirm_password" type="password">
		<input name="registration" type="submit" value="Registraton">
	</form>
</body>
</html>