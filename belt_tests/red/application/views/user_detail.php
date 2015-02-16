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
</head>
<body>
<header class="navbar">
	<div class="container">
		<div class="navbar-right">
			<ul class="nav navbar-nav">
				<li><a href="/friends">Home</a></li>
				<li><a href="/logout">Logout</a></li>
			</ul>
		</div>
	</div>
</header>

<div id="main" class="container">
	<div class="row">
		<div class="col-md-6">
			<h3><?= $user["name"]?>'s Profile</h3>
			<ul>
				<li>Name: <?= $user["name"]?></li>
				<li>Alias: <?= $user["alias"]?></li>
				<li>Email: <?= $user["email"]?></li>
				<li>Date of Birth: <?= $user["birth"]?></li>
			</ul>
		</div>

	</div>
</div>
</body>
</html>