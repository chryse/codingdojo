<!DOCTYPE html>
<html>
<head>
	<title>Ninja Gold Game</title>
	<meta charset="utf-8">
	<style>
		* {
			box-sizing: border-box;
			-webkit-box-sizing: border-box;
			-moz-box-sizing: border-box;
			-o-box-sizing: border-box;
			font-family: helvetica, sans-serif;
		}

		#wrapper {
			width: 800px;
			margin: 0 auto;
			border: 0;
			padding: 0;
		}

		form, div {
			padding: 10px;
		}

		div {
			margin: 10px 0;
		}

		.gold * {
			display: inline-block;
			width: 120px;
			font-size: 1.3em;
		}

		form.input {
			display: inline-block;
			width: 180px;
			float: left;
			margin: 10px 10px;
			padding: 40px 5px;
			text-align: center;
			border: 1px solid #aaa;
			border-radius: 5px;
			color: white;
		}

		form.reset {
			float: right;
			display: inline-block;
			border: 0px;
			vertical-align: top;
			margin: 0;
			padding: 0 10px 0 0;
		}

		form.reset input {
			background: #1b99e9;
			color: white;
		}

		input {
			margin-top: 30px;
			width: 100px;
			height: 30px;
			background: white;
			color: grey;
			border-radius: 5px;
			outline: none;
		}

		label {
			font-size: 0.9em;
		}

		div.result {
			display: block;
			line-height: 1.5em;
			height: 300px;
			overflow: scroll;
			border: 1px solid #aaa;
		}

		.red {
			color: red;	
		}

		.green {
			color: #00a651;
		}

		.yellow {
			color: #a5db00;
		}

		.farm {
			background: #00a651;
		}

		.cave {
			background: #70450e;
		}

		.house {
			background: #30bbe8;
		}

		.casino {
			background: #d64393;
		}

		.clearfix {
			clear:both;
			border: 0px;
			margin: 0;
			padding: 0;
		}

		.go-back {
			float: right;
			padding: 10px;
			background: #f9d;
			font-size: 1.2em;
			color: white;
			border-radius: 5px;
		}

		a { outline: none; }
	</style>
</head>
<body>
	<div id="wrapper">
		<h1>Ninja Gold Game</h1>
		<form method="post" action="reset" class="reset">
			<input type="submit" name="reset_btn" value="Reset">
			<input type="hidden" name="reset">
		</form>
		<div class="gold">
			<h3>Your Gold</h3>
			<div>
				<span class="yellow"><?= $total_gold ?></span>
			</div>
		</div>
		<form method="post" action="/gold-process" class="input farm">
			<label>
				Farm<br />(earns 10-20 golds)
			</label>
			<input type="submit" name="farm_go" value="Find Gold!">
			<input type="hidden" name="selection" value="farm">
		</form>
		<form method="post" action="/gold-process" class="input cave">
			<label>
				Cave<br />(earns 5-10 golds)
			</label>
			<input type="submit" name="cave_go" value="Find Gold!">
			<input type="hidden" name="selection" value="cave">
		</form>
		<form method="post" action="/gold-process" class="input house">
			<label>
				House<br />(earns 2-5 golds)
			</label>
			<input type="submit" name="house_go" value="Find Gold!">
			<input type="hidden" name="selection" value="house">
		</form>
		<form method="post" action="/gold-process" class="input casino">
			<label>
				Casino!<br />(earns/takes 0-50 golds)
			</label>
			<input type="submit" name="casino_go" value="Find Gold!">
			<input type="hidden" name="selection" value="casino">
		</form>
		<div class="clearfix"></div>
		<h4>Activities: </h4>
		<div class="result"><?= $activities ?></div>

		<a href="/"><button class="go-back">Go Back</button></a>
	</div>
</body>
</html>

