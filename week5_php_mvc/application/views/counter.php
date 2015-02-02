<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Counter Demo</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }
	::-webkit-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
		text-align: center;
	}

	#container {
		width: 100%;
		margin: 0 auto;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
		text-align: center;
	}

	.count {
		padding: 30px;
		font-size: 1.5em;
		border: 1px solid silver;
		border-radius: 5px;
		width: 100px;
		display: inline-block;
	}

	button {
		margin: 20px 0;
		width: 100px;
		height: 40px;
		border-radius: 5px;
		background: yellow;
	}
	</style>
</head>
<body>

<div id="container">
	<h1>Counter Demo</h1>

	<div class="result">
		<h1>You visited the site</h1>
		<div class="count"><?= $counter ?></div>
		<h1>times</h1>
	</div>
	<a href="counter-reset"><button>Reset</button></a>
	<a href="/"><button class="btn-primary">Go Back</button></a>
</div>

</body>
</html>