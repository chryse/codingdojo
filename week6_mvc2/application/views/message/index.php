<?php
defined("BASEPATH") OR exit("No direct script access allowed.");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>AJAX and jQuery</title>
	<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
	<script type="text/javascript">
		$(document).ready(function() {
			$("#main-form").submit(function() {
				$.post(
					$("#main-form").attr("action"), //url where the request is sent
					$("#main-form").serialize(),	//data sent to server 
					function(data) {				//callback function run if the request succeeded
						console.log(data);
						$("#messages").append("name: " + data.name + " age: " + data.age + "<br />");
					},
					"json"							//data type expected from the server
				);	
				return false;
			});
		});
	</script>
	<style>
		#messages {
			line-height: 2.0em;
			margin-top: 20px;
		}
	</style>
</head>
<body>
	<div class="container">
		<h1>AJAX and jQuery</h1>
		<form id="main-form" action="/random_message/process" method="post">
			<input class="btn btn-primary" type="submit" value="Get a random user info" />
		</form>
		<div id="messages"></div>
	</div>
</body>
</html>