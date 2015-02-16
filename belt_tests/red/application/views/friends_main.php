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
		// $(document).ready(function(){
		// 	$(document).on("submit", "form#add", function(){
		// 		var action = $(this).attr("action");
		// 		$.ajax({
		// 			url: $(this).attr("action"),
		// 			type: "POST",
		// 			data: $(this).serialize()
		// 		}).done(function(result_table){
		// 			// alert(result_table);
		// 			// // $("#friend-list").html(result_table);
		// 			// // alert(result_table);
		// 			// // alert(action);
		// 			if(action == "add"){
		// 				$("#friend-list").html(result_table);
		// 			}
		// 			else {
		// 				$("#non-friend-list").html(result_table);
		// 			}
		// 		});
		// 		return false;
		// 	})
		// })
	</script>
</head>
<body>
<header class="navbar">
	<div class="container">
		<div class="navbar-right">
			<ul class="nav navbar-nav">
				<li><a href="/logout">Logout</a></li>
			</ul>
		</div>
	</div>
</header>

<div id="main" class="container">
	<div class="row">
		<h1>Hello, <?= $this->session->userdata("user")["name"] ?></h1>
		<div class="col-md-6">
			<h4>Here is the list of your friends:</h4>

			<!-- friend list view  start-->
			<div id="friend-list">
				<?php include("friends_list.php") ?>
			<!-- friend list view end -->
			</div>

		</div>
		<div class="col-md-6">
			<h4>Other Users not on your friend's list</h4>

			<div id="non-friend-list">

				<?php include("non_friends_list.php") ?>

			</div>
		</div>
	</div>
</div>
</body>
</html>