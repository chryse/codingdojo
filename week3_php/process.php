<?php
session_start();

echo "SERVER INFO: <br />";
var_dump($_SERVER);

echo "<br /><br />REQUEST INFO:<br />";
var_dump($_REQUEST);

echo "<br /><br />GET INFO:<br />";
var_dump($_GET);

echo "<br /><br />POST INFO:<br />";
var_dump($_POST);

if(isset($_POST["color"])) {
	$_SESSION["color"] = $_POST["color"];	
}

if(isset($_POST["music"])) {
	$_SESSION["music"] = $_POST["music"];	
}

echo "<br /><br />FILE INFO:<br />";
var_dump($_FILES);

echo "<br /><br />COOKIE INFO:<br />";
var_dump($_COOKIE);

echo "<br /><br />SESSION INFO:<br />";
var_dump($_SESSION);
?>