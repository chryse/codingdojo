<?php
defined("BASEPATH") OR exit("No direct script access allowed.");
?>
<html lang="en">
<head>
	<title><?= $title; ?></title>
	<meta charset="utf-8">
	<link href="/assets/bootstrap.min.css" type="text/css" rel="stylesheet">
	<link href="/assets/style.css" type="text/css" rel="stylesheet">
</head>
<body>
	<? include("header.php"); ?>

	<div class="container padding-top">
		<div class="row">
			<div class="col-md-12 text-right">
				<h1 class="text-left"><?= $title; ?></h1>
				<a href="/dashboard"><button class="btn btn-success">Return to Dashboard</button><a/>
			</div>
			<div class="col-md-6">
				<?
					if($this->session->flashdata("signin_errors")) {
						echo "<div class='bg-danger'><p>";
						echo $this->session->flashdata("signin_errors");
						echo "</p></div>";
					}
				?>
				<form method="post" action="/users/add_process">
					<div class="form-group">
						<label>Email Address:</label>
						<input class="form-control" name="email" type="email">
					</div>
					<div class="form-group">
						<label>First Name:</label>
						<input class="form-control" name="first_name" type="text">
					</div>
					<div class="form-group">
						<label>Last Name:</label>
						<input class="form-control" name="last_name" type="text">
					</div>
					<div class="form-group">
						<label>Password:</label>
						<input class="form-control" name="password" type="password">
					</div>
					<div class="form-group">
						<label>Password Confirmation:</label>
						<input class="form-control" name="confirm_password" type="password">
					</div>
					<div class="form-group text-right">
						<input type="hidden" name="action" value="adduser">
						<button type="submit" class="btn btn-primary">Add a user</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<? include("footer.php"); ?>
</body>
</html>