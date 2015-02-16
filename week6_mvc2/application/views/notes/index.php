<?php
defined("BASEPATH") OR exit("No direct script access allowed.");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Ajax Posts</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$("form").submit(function() {
				$.ajax({
					url: "/notes/create",
					type: "post",
					data: {
							message : $("textarea").val()
						  }
				})

				//second approach for the first page, only need recent data to update post box and save it onto database
				.done(function(data) {

					console.log(data);
					// check this is first one				
					if($("div.post div").length == 0) {
						$("div.post").html("<div>" + data + "</div>");
						// $("<div>" + data + "</div>").appendTo("div.post");
					}
					// if there are childred in post class
					else {
						$("div.post div:first-child").before("<div>" + data + "</div>");
					}
					
					$("textarea").val("");
					
				});

				// firsrt approach for the first page
				// .done(function(data) {
				// 	var obj = $.parseJSON(data);
				// 	var div_box = "";
				// 	foreach(obj, function(item) {
				// 		div_box += "<div>";
				// 		div_box += item.description;
				// 		div_box += "</div>";
				// 		console.log(item.description);
				// 	})
				// 	console.log(div_box);
				// 	$("div.post").html(div_box);
				// 	$("textarea").val("");
				// });
				return false;
			});
		});

		// my foreach function
		var foreach = function(collection, callback) {
			if(Array.isArray(collection)) {
				for(var i = 0; i < collection.length; i++) {
					callback(collection[i]);
				}
			}
			else {
				for(var key in collection) {
					callback(collection[key]);
				}
			}
		}
	</script>
	<style>
		div.post div {
			display: inline-block;
			width: 200px;
			height: 200px;
			border: 1px solid silver;
			margin: 10px;
			padding: 10px;
			background: yellow;
			color: black;
			vertical-align: top;
			overflow: auto;
		}
	</style>
</head>
<body>
	<div class="container">
		<h1>Ajax Posts</h1>
		
		<h2>My Posts</h2>
		<div class="row">
			<div class="col-md-12">
				<div class="post">
					<?php
						foreach($messages as $message) {
							echo "<div>";
							foreach ($message as $key => $value) {
								echo $value;
							}
							echo "</div>";
						}
					?>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6">
				<h3>Add a note:</h3>
				<form action="/notes/create" method="post">
					<div class="form-group">
						<textarea name="message" class="form-control"></textarea>
					</div>
					<div class="form-group">
						<input type="hidden" name="check" value="ok">
						<button type="submit" name="submit" class="btn btn-primary">Post It!</button>
					</div>
				</form>
			</div>
		</div>
	</div>

</body>
</html>