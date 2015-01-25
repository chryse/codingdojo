<?php
	session_start();
	require("connection.php");

	if(isset($_POST["action"]) && $_POST["action"] == "login") {
		var_dump($_POST);
	}

	if(isset($_POST["action"]) && $_POST["action"] == "registration") {
		var_dump($_POST);
	}
?>