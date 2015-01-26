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
		form {
			display: inline-block;
			width: 400px;
		}
		label, input {
			display: block;
			width: 100%;
			/*height: 20px;*/
			margin-bottom: 10px;
			font-size: 1.0em;
			padding: 5px 0;
		}
		input[type=submit] {
			background: grey;
			color: white;
			font-size: 1.0em;
			padding: 5px 0;
		}
		.error {
			color: red;
		}
	</style>
</head>
<body>
	<h1>Log in and Registration</h1>
	<h2>Login</h2>
	<div>
		<?php
			if(isset($_SESSION["errors"])) {
				foreach($_SESSION["errors"] as $error) {
					echo "<p class='error'>$error</p>";
				}
				unset($_SESSION["errors"]);
			}
		?>
	</div>
	<form method="post" action="login_control.php">
		<input name="action" type="hidden" value="login">
		<label>Email address:</label>
		<input name="email" type="email">
		<label>Password:</label>
		<input name="password" type="password">
		<input name="login" type="submit" value="Log In">
	</form>
	<h2>Registration</h2>
	<form method="post" action="login_control.php">
		<input name="action" type="hidden" value="registration">
		<label>First Name:</label>
		<input name="first_name" type="text">
		<label>Last Name:</label>
		<input name="last_name" type="text">
		<label>Emali:</label>
		<input name="email" type="email">
		<label>Password:</label>
		<input name="password" type="password">
		<label>Confirm Password</label>
		<input name="confirm_password" type="password">
		<input name="registration" type="submit" value="Registraton">
	</form>
</body>
</html>