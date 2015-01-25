<?php

	session_start();

	include("header.php");
?>

<body>
	<div id="wrapper">
		<h1>Welcome to Quoting Dojo</h1>
	<?php
		if(isset($_SESSION["errors"])) {
	?>
		<div class='error'>
	<?php
			foreach($_SESSION["errors"] as $error) {
				echo "- $error<br />";
			}
			unset($_SESSION["errors"]);
	?>
		</div>
	<?php
		}
	?>
		<form method="post" action="process.php">
			<label>Your Name:</label>
			<input name="name" type="text">
			<label>Your Quote</label>
			<textarea name="quote" rows="5" cols="10"></textarea>
			<input class="post" name="put_quote" type="submit" value="Add my quote!">
			<input class="skip" name="skip_quote" type="submit" value="Skip to quotes!">
			<input name="action" type="hidden" value="action">
		</form>
	</div>
</body>
</html>