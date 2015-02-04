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
				<h3>Edit Information</h3>
				<?
					if($this->session->flashdata("input_errors1")) {
						echo "<div class='bg-danger'><p>";
						echo $this->session->flashdata("input_errors1");
						echo "</p></div>";
					}
				?>
				<form method="post" action="/users/edit_process">
					<div class="form-group">
						<label>Email Address:</label>
						<input class="form-control" name="email" type="email" value="<?= $user['email']; ?>">
					</div>
					<div class="form-group">
						<label>First Name:</label>
						<input class="form-control" name="first_name" type="text" value="<?= $user['first_name']; ?>">
					</div>
					<div class="form-group">
						<label>Last Name:</label>
						<input class="form-control" name="last_name" type="text" value="<?= $user['last_name']; ?>">
					</div>
					<div class="form-group text-right">
						<input type="hidden" name="action" value="edit_info">
						<input type="hidden" name="user_id" value="<?= $user['id']; ?>">
						<input type="hidden" name="current_url" value="<?= $current_url; ?>">
						<button type="submit" class="btn btn-primary">Save</button>
					</div>
				</form>
			</div>
			<div class="col-md-6">
				<h3>Change Password</h3>
				<?
					if($this->session->flashdata("input_errors2")) {
						echo "<div class='bg-danger'><p>";
						echo $this->session->flashdata("input_errors2");
						echo "</p></div>";
					}
				?>
				<form method="post" action="/users/edit_process">
					<div class="form-group">
						<label>Password:</label>
						<input class="form-control" name="password" type="password">
					</div>
					<div class="form-group">
						<label>Password Confirmation:</label>
						<input class="form-control" name="confirm_password" type="password">
					</div>
					<div class="form-group text-right">
						<input type="hidden" name="action" value="change_password">
						<input type="hidden" name="user_id" value="<?= $user['id']; ?>">
						<input type="hidden" name="current_url" value="<?= $current_url; ?>">
						<button type="submit" class="btn btn-primary">Update Password</button>
					</div>
				</form>
			</div>
			<div class="col-md-12">
				<h3>Edit Description</h3>
				<form method="post" action="/users/edit_process">
					<div class="form-group">
						<textarea rows="5" class="form-control" name="description" value="sdfasfas"></textarea>
					</div>
					<div class="form-group text-right">
						<input type="hidden" name="action" value="add_description">
						<input type="hidden" name="user_id" value="<?= $user['id']; ?>">
						<input type="hidden" name="current_url" value="<?= $current_url; ?>">
						<button type="submit" class="btn btn-primary">Save</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<? include("footer.php"); ?>

</body>
</html>