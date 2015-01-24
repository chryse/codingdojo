<?php
	session_start();
	echo "<br /><br />COOKIE INFO:<br />";
	var_dump($_COOKIE);

	echo "<br /><br />SESSION INFO:<br />";
	var_dump($_SESSION);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>superglobal example</title>
</head>
<body>
	<form action="process.php" method="post">
		<div>
			<label for="color">What is your favorite color?</label>
			<input type="text" name="color" placeholder="put your color here">
		</div>
		<div>
			<label for="color">What is your favorite type of music?</label>
			<select name="music">
				<option value="hip pop">Hip Pop</option>
				<option value="pop">Pop</option>
				<option value="rock">Rock</option>
				<option value="alternative">Alternative</option>
				<option value="country">Country</option>
				<option value="new age">New Age</option>
				<option value="classical">Classical</option>
			</select>
		</div>
		<div>
			<label for="color">Chodse File:</label>
			<input type="file" name="file">
		</div>
		<div>
			<input type="submit" value="Submit">
		</div>
	</form>
</body>
</html>
<?php
$_SESSION = array();
// unset($_SESSION["music"]);
?>