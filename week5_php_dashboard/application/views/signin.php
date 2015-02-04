<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?= $title; ?></title>
    <meta charset="utf-8">
    <link href="/assets/bootstrap.min.css" type="text/css" rel="stylesheet">
    <link href="/assets/style.css" type="text/css" rel="stylesheet">
</head>
<body>
	<? include("header.php") ?>

	<div class="container padding-top">
		<div class="col-md-6">
			<h1 class="text-left"><?= $title; ?></h1>
			<?
				if($this->session->flashdata("signin_errors")) {
					echo "<div class='bg-danger'><p>";
					echo $this->session->flashdata("signin_errors");
					echo "</p></div>";
				}
			?>
			<form method="post" action="/signin_process">
				<div class="form-group">
					<label>Email Address:</label>
					<input class="form-control" name="email" type="email" placeholder="email">
				</div>
				<div class="form-group">
					<label>Password:</label>
					<input class="form-control" name="password" type="password" placeholder="password">
				</div>
				<div class="form-group text-right">
					<input type="hidden" name="action" value="signin">
					<button type="submit" class="btn btn-primary">Sign In</button>
				</div>
				<p><a href="/signup">Don't have an account? Register.</a></p>
			</form>
		</div>
	</div>

	<? include("footer.php") ?>
	
</body>
</html>