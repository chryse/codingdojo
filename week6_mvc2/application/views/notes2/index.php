<?php
defined("BASEPATH") OR exit("No direct script access allowed.");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Ajax Notes</title>
	<link href="/assets/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="/assets/font-awesome.min.css" rel="stylesheet" type="text/css">
	
	<script src="/assets/jquery-2.1.3.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$(document).on("submit", "form", function() {
				$.ajax({
					url: $(this).attr("action"),
					type: "post",
					data: $(this).serialize()
				}).done(function(data) {					
					$(".result").html(data);
					$("#add-form input").val("");
					$("#add-form textarea").val("");
				})
				return false;
			});

			$(document).on("change", "div.note textarea", function() {
				$(this).parent().submit();
			});
		})
	</script>
	<style>
		.note {
			display: inline-block;
			width: 200px;
			height: 250px;
			background: yellow;
			margin: 10px;
			padding: 10px;
			border-radius: 5px;
		}

		.note textarea {
			width: 100%;
			height: 130px;
		}

	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<h1>Ajax Notes</h1>
			<div class="col-md-12">
				<h2>My Notes</h2>
				<div class="result">
					<?php include("partial.php"); ?>
				</div>
			</div>
			
			<div class="col-md-6">
				<h3>Add a note</h3>
				<form method="post" action="/notes2/add" id="add-form">
					<div class="form-group">
						<input type="input" name="title" class="form-control" placeholder="title">
					</div>
					<div class="form-group">
						<textarea name="description" class="form-control" placeholder="Write a note."></textarea>
					</div>
					<div class="form-group text-right">
						<button type="submit" class="btn btn-primary">Add note</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>