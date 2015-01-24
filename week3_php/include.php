<?php
	// $name = "Henry";
	// include("content.php");
	// $name = "Joe";
	// include("content.php");
	// $name = "Kaitlin";
	// include("content.php");
	// $name = "Jun";
	// include("content.php");
	// include_once("function.php");
	// include_once("function.php");
	// include_once("function.php");

	// do not process lines below if there is no names.php
	// require("names.php");

	// go to process lines below although there is no names.php
	// include("names.php");

	// echo "I made i here";


	// print_name("Randall");
	// print_name("Joe");
	// print_name("Carry");
	include("mysql.php");
	// $query = "select * from people";
	// $people = fetch_all($query);
	// var_dump($people);

	$new_person_query = "insert into people (first_name, last_name, people.from, people.to) values('jun', 'kim', now(), now())";
	// echo $new_person_query;
	// die();
	run_mysql_query($new_person_query);
	$query = "select * from people where first_name = 'tiger'";
	$person = fetch_record($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>DB Connection and Fetch</title>
</head>
<body>
	<?php
		// foreach($people as $person) {
		// 	echo "<h3>{$person["first_name"]} {$person["last_name"]}</h3>";
		// }
		echo "<h3>{$person["first_name"]} {$person["last_name"]}</h3>";
	?>
</body>
</html>
