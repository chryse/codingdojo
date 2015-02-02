<!DOCTYPE html>
<html>
<head>
	<title>Login and Registration</title>
	<meta charset="utf-8">
	<link href="/assets/bootstrap.min.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">
	<!-- error messages -->
	<?php
		if($this->session->flashdata("login_errors")) {
			echo "<div class='row'><div class='col-sm-6 col-sm-offset-3 bg-danger'>";
			echo $this->session->flashdata("login_errors");
			echo "</div></div>";
		}	
	?>
	
	<div class="row">
		<div class="col-sm-6 col-sm-offset-3">
			<h2>Login</h2>
			<form class="form-horizontal" method="post" action="login-process">
				<input name="action" type="hidden" value="login">
				<div class="form-group">
					<label class="col-sm-3 control-label">Email address:</label>
					<div class="col-sm-9">
						<input name="email" type="text" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Password:</label>
					<div class="col-sm-9">
						<input name="password" type="password" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-3 col-sm-9">
						<button name="login" type="submit" class="btn btn-primary">Log In</button>
					</div>
				</div>
			</form>
		</div>
		<div class="col-sm-6 col-sm-offset-3">
		<h2>Registration</h2>
			<form class="form-horizontal" method="post" action="login-process">
				<input name="action" type="hidden" value="registration">
				<div class="form-group">
					<label class="col-sm-3 form-label">First Name:</label>
					<div class="col-sm-9">
						<input name="first_name" type="text" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 form-label">Last Name:</label>
					<div class="col-sm-9">
						<input name="last_name" type="text" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 form-label">Emali:</label>
					<div class="col-sm-9">
						<input name="email" type="email" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 form-label">Password:</label>
					<div class="col-sm-9">
						<input name="password" type="password" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 form-label">Confirm Password</label>
					<div class="col-sm-9">
						<input name="confirm_password" type="password" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-3 col-sm-9">
						<button name="registration" type="submit" class="btn btn-primary">Registration</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<footer>
	<div class="container">
		<div class="row">
			<a href="/"><button class="btn-success">Go Back</button></a>
			<p class="text-center">Copyright @hyunjunkim.com 2015</p>
		</div>
	</div>
</footer>
</body>
</html>