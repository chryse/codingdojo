<?php
	session_start();
	$_SESSION["counter"] = 0;
	header("location: counter.php");
	echo $_SESSION["counter"];
	// die();
?>