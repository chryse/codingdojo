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
		<div class="row">
			<div class="col-md-6 main-view">
				<h1>Welcome to the Dashboard</h1> 
				<h2>We're going to build a cool application using a MVC framework! This application was built with the Village88 folks!</h2>
				<a class="btn btn-large btn-success" href="/signup">Sign up now!</a>
			</div>
		<div>
		<div class="row">
			<div class="col-md-4 text-center">
				<h3>Manage User</h3>
				<p>Using this application, you'll learn how to add, remove, and edit users for the application</p>
			</div>
			<div class="col-md-4 text-center">
				<h3 class="text-center">Leave messages</h3>
				<p>Users will be able to leave a message to another user using this application.</p>
			</div>
			<div class="col-md-4 text-center">
				<h3>Edit User Information</h3>
				<p>Admins will be able to edit another user's information (email address, first name, last name, etc).</p>
			</div>
		</div>	
	</div>

	<? include("footer.php") ?>
</body>
</html>