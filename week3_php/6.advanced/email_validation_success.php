<?php
	session_start();

	if(isset($_SESSION["success"])) {
		$success = $_SESSION["success"];
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Email Validation Success</title>
	<meta charset="utf-8">
	<style>
		#wrapper {
			width: 600px;
			margin: 0 auto;
		}

		div.success {
			width: 600px;
			border: 1px solid #aaa;
			background: lightgreen;
			text-align: center;
			padding: 40px 0;
			margin: 10px 0;
			font-size: 1.2em;
		}
	</style>
</head>
<body>
	<div id="wrapper">
		<div class="success"><?= $success ?></div>
	</div>
</body>
</html>