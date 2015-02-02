<?php
defined("BASEPATH") OR exit("No direct script access allowed");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Random Words</title>
	<style>
		* {
			font-family: helvetica, sans-serif;
		}
		#wrapper {
			width: 500px;
			margin: 20px auto;
			padding: 20px;
			text-align: center;
			border: 1px solid silver;
		}

		div.box {
			margin: 20px;
			width: 200px;
			background: #aaa;
			display: inline-block;
			padding: 20px;
			font-size: 18px;
			color: white;
			border-radius: 5px;
		}

		a {
			display: block;
			text-decoration: none;

		}
		a button {
			display: inline-block;
			color: black;
			background: #aed;
			font-size: 16px;
			padding: 10px;
			text-align: center;
			border-radius: 5px;
			outline: none;
		}

		#box {
			margin: 0 auto;
			width: 100%;
			text-align: center;
		}

	</style>
</head>
<body>
	<div id="wrapper">
		<h1>Random Word (Attemp #<?= $attempt ?>)</h1>
		<div class="box">
			<?= $rand_word ?>
		</div>
		<a href="randomword-generate">
			<button>Generate</button>
		</a>
	</div>
	<div id="box">
		<a href="/"><button>Go Back</button></a>
	</div>
</body>
</html>