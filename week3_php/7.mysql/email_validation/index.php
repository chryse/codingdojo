<?php
	session_start();
	include("email_Validation_with_db_header.php");
?>

<body>
	<div id="wrapper">
		<h1>Email Validation with DB</h1>
		<hr />
		<h2>Please enter your email address</h2>
		<?php
			if(isset($_SESSION["errors"])) {
				foreach($_SESSION["errors"] as $error) {
					echo "<div class='error'>$error</div>";
				}
				unset($_SESSION["errors"]);
			}
		?>
		<form method="post" action="email_validation_with_db_control.php">
			<input type="email" name="email" placeholder="Enter your email address">
			<input type="hidden" name="action" value="insert_email">
			<input type="submit" value="Submit" class="submit">
		</form>
	</div>
</body>
</html>