<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Welcome</title>
	<meta charset="utf-8">
	<link href="/assets/bootstrap.min.css" type="text/css" rel="stylesheet">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">
	<link href="/assets/style.css" rel="stylesheet" type="text/css">
	<script src="/assets/jquery-2.1.3.min.js"></script>
	<script src="//code.jquery.com/ui/1.11.3/jquery-ui.js"></script>
	<script>
		$(document).ready(function() {
			$("#birth").datepicker();
		});
	</script>
</head>
<body>

<div id="main" class="container">
	<div class="row">
		<h1>Welcome!</h1>
<?
	if($this->session->flashdata("login_errors")) {
		echo "<div class='bg-danger'><p>";
		echo $this->session->flashdata("login_errors");
		echo "</p></div>";
	}
?>		
		<div class="col-md-6">
			<h2>Register</h2>
			<form method="post" action="/main/login_process">
				<div class="form-group">
					<label>Name</label>
					<input class="form-control" name="name" type="text">
				</div>
				<div class="form-group">
					<label>Alias</label>
					<input class="form-control" name="alias" type="text">
				</div>
				<div class="form-group">
					<label>Email</label>
					<input class="form-control" name="email" type="email">
				</div>
				<div class="form-group">
					<label>Password</label>
					<input class="form-control" name="password" type="password">
				</div>
				<p>
					* Password should be at least 8 characters.
				</p>
				<div class="form-group">
					<label>Confirm Password</label>
					<input class="form-control" name="confirm_password" type="password">
				</div>
				<div class="form-group">
					<label>Date of Birth</label>
					<input id="birth" name="birth" type="text">
				</div>
				<div class="form-group text-right">
					<input type="hidden" name="action" value="register">
					<button class="btn btn-primary" type="submit">Register</button>
				</div>
			</form>
		</div>
		<div class="col-md-6">
			<h2>Login</h2>
			<form method="post" action="/main/login_process">
				<div class="form-group">
					<label>Email</label>
					<input class="form-control" name="email" type="email">
				</div>
				<div class="form-group">
					<label>Password</label>
					<input class="form-control" name="password" type="password">
				</div>
				<div class="form-group text-right">
					<input type="hidden" name="action" value="login">
					<button class="btn btn-primary" type="submit">Login</button>
				</div>
			</form>
		</div>
	</div>
</div>
</body>
</html>