<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Time Display</title>
	<style>
		#wrapper {
			width: 500px;
			margin: 0 auto;
			text-align: center;
		}
		h1 {
			display: inline-block;
			border: 1px solid silver;
			padding: 20px;
			
		}
		.time {
			padding: 40px 0;
			font-size: 20px;
			border: 1px solid silver;
		}

	</style>
</head>
<body>
	<div id="wrapper">
		<h1>The Current Time & Date</h1>
		<div class="time">
			<?= $now; ?>
		</div>
		<a href="/"><button class="btn-primary">Go Back</button></a>
	</div>
	

</body>
</html>