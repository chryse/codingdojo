<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Email Validation without DB</title>
	<meta charset="utf-8">
	<style>
	body {
		font-size: 1.0em;
	}

	#wrapper {
		width: 600px;
		margin: 0 auto;
	}

	h1, h2, form, p {
		text-align: center;
	}

	input {
		display: block;
		width: 300px;
		height: 30px;
		margin: 0 auto;
		margin-bottom: 10px;
		font-size: 1.1em;
	}

	input.submit {
		background: #0eb;
		color: white;
		outline: none;
	}

	div.error {
		width: 100%;
		border: 1px solid #aaa;
		background: pink;
		text-align: center;
		padding: 40px 0;
		margin: 10px 0;
		font-size: 1.2em;
		color: white;
	}


	</style>
</head>
	<div id="wrapper">
		<h1>Email Validation without DB</h1>
		<hr />
		<h2>Please enter your email address</h2>
		<?php
			if(isset($_SESSION["errors"])) {
				foreach($_SESSION["errors"] as $error) {
					echo "<div class='error'> $error </div>";
				}
				unset($_SESSION["errors"]);
			}
		?>
		<form method="post" action="email_validation_control.php">
			<input type="email" name="email" placeholder="email address">
			<input type="hidden" name="action" value="login">
			<input type="submit" value="Submit" class="submit">
		</form>
	</div>
<body>
</body>
</html>