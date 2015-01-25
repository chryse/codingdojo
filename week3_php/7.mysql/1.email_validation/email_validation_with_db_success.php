<?php
	session_start();
	require("email_validation_with_db_connect.php");
	include("email_validation_with_db_header.php");
?>

<body>
	<div id="wrapper">
		
<?php
		if(isset($_SESSION["success"])) {
?>
		<div class="success">
<?php
			echo $_SESSION["success"];
			unset($_SESSION["success"]);
?>
		</div>
<?php
		}
?>			
		<div>
			<h3>Email Addresses Entered:</h3>
<?php
			// when reset button is clicked
			if(isset($_POST["reset"])) {
				$delete_query = "delete from emails";
				run_mysql_query($delete_query);
				echo "<div class='output'><h3 class='red'>All data was deleted.!!</h3></div>";
			}

			// show all emails
			else {
				$get_emails = "select * from emails";
				$all_emails = fetch_all($get_emails);
				$count_emails = count($all_emails);
?>
			<div class='output'>
<?php
				foreach($all_emails as $email) {
					echo "<h3>{$email['email']} {$email['create_at']}</h3>";
				}
?>
			</div>
<?php
			}

?>
		</div>
		<form class="reset" method="post" action="email_validation_with_db_success.php">
			<input type="submit" name="reset" value="Delete">
		</from>
		<button><a href="index.php">Go Back</a></button>
	</div>
</body>
</html>
