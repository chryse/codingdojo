<h1>Array</h1>
<p>
	<?php
		$students = array();
		$students[] = "Jun1";
		$students[] = "Jun2";
		$students[] = "Jun3";
		echo "This is student 0:" . $students[0] . "<br />";
		echo "This is student 1:" . $students[1] . "<br />";
		echo "This is student 2:" . $students[2] . "<br / >";
	?>
</p>
<p>
	<?php
		$students = array("Jun1", "jun2", "jun3");
		echo "This is student 0:" . $students[0] . "<br />";
		echo "This is student 1:" . $students[1] . "<br />";
		echo "This is student 2:" . $students[2] . "<br / >";
	?>
</p>
<p>
	<?php
		$students = array(
						array("jun1", "kim", 10),
						array("jun2", "lee", 20),
						array("jun3", "park", 30)
					);
		echo "This is the age of 0 " . $students[0][2] . "<br />";
		echo "This is the age of 1 " . $students[1][2] . "<br />";
		echo "This is the age of 2 " . $students[2][2] . "<br />";
		echo $students[0][2];
	?>
<p>
	<?php
		// asssociative array, hash arrayes, dictionaries
		// $students = array("first_name" => "jun", "last_name" => "kim", "age" => 22);

		// echo $students["first_name"]."<br/>";
		// echo $students["last_name"]."<br/>";
		// echo $students["age"]."<br/>";
		// echo $students[0];
	?>
</p>
<p>
	<?php
		$students = array(
						array("first_name" => "Jun1", "last_name" => "kim", "age" => 11),
						array("first_name" => "Jun2", "last_name" => "lee", "age" => 21),
						array("first_name" => "Jun3", "last_name" => "park", "age" => 32)
					);
		echo $students[0]["first_name"]."<br/>";
		echo $students[1]["first_name"]."<br/>";
		echo $students[2]["first_name"]."<br/>";
	?>
</p>
<h1>Conditionals</h1>
<p>
	<?php
		$input = true;
		if($input) {
			echo "this is the true";
		}
		else {
			echo "this is not true";
		}
	?>
</p>
<p>
	<?php
		$name = "Sarah";
		$on_guest_list = false;
		$guest_number = 11;
		$age = 33;
		$party_message = "";

		if($on_guest_list) {
			$party_message = "Hey ". $name . "! Welcome to the party!";
		}
		else if($name == "Joey" || $name == "Sarah") {
			$party_message = "sorry " . $name . ". You are not allowed.";
		}
		else if($guest_number > 10) {
			$party_message = "sorry " . $name . "., but we have too many paritier here!";
		}
		else if($age <= 20) {
			$age_difference = 21 - $age;
			$party_message = "sorry " . $name . ", but you have " . $age_difference . " more year(s) to go.";
		}
		else {
			$party_message = "hey " . $name . " we are happy to have you!";
		}

		echo $party_message;
	?>
</p>
<p>
	<?php
		$number = 2;
		switch($number) {
			case 1:
				echo "red - " . $number;
			break;

			case 2:
				echo "orange - " . $number;
			break;

			case 3:
				echo "yellow - " . $number; 
			break;
				echo "green - " . $number;
			case 4:
				echo "pink - " . $number;
			break;
			case 5:
				echo "purple - " . $number;
			break;

			case 6:
			break;
		}
	?>
</p>
<h1>Loop</h1>
<p>
	<?php
		for($i = 0; $i < 10; $i++) {
			echo $i."<br />";
		}
	?>
</p>
<p>
	<?php
		for($i = 0; $i < 10; $i++) {
			echo $i . "<br />";
			for($j = 0; $j < 5; $j++) {
				echo $j;
			}
			echo "<br>";
		}
	?>
</p>
<p>
	<?php
		$users = array("Michael", "Charles", "John", "Mark");
		for($i = 0; $i < count($users); $i++) {
			echo $users[$i] . " ";
		}
	?>
</p>
<p>
	<?php
		$users = array(
					array("Randall", "Frisk", 27),
					array("Michael", "Choi", 33),
					array("Charles", "Holloman", 27)
				);
		for($i = 0; $i < count($users); $i++) {
			for($j = 0; $j < count($users[$i]); $j++) {
				echo $users[$i][$j] . " ";
			}
			echo "<br/>";
		}
	?>
</p>
<p>
	<?php
		$users = array(
					array("first_name" => "Randall", "last_name" => "Frisk", "age" => 30),
					array("first_name" => "Michael", "last_name" => "Choi", "age" => 22),
					array("first_name" => "Jun", "last_name" => "Kim", "age" => 21)
				);
		foreach($users as $row) {
			foreach($row as $info => $value) {
				echo $info . ": " . $value . " ";
			}
			echo "<br/>";
		}
	?>
</p>
<p>
	<?php
		$users1 = array("fisrt_name" => "Randall", "last_name" => "Frisk", "age" => 22);

		foreach($users1 as $key => $value) {
			echo $key . ": " . $value . "<br />";
		}
	?>
</p>
<h1>Functions</h1>
<p>
	<?php
		$clients = array("jun1", "jun2", "jun3", "jun4");
		$clients_associative = array(
									array("age" => 21 , "number" => 1, "name" => "jun"),
									// array("age" => 21 , "number" => 1, "name" => "jun"),
									// array("age" => 21 , "number" => 1, "name" => "jun")
									array("number" => 2, "age" => 22, "name" => "jun1"),
									array("name" => "jun3", "number" => 4, "age" => 11)
								);
		function print_users($users) {
			foreach($users as $row) {
				foreach($row as $key => $value) {
					echo $key . ": " . $value . "<br />";
				}
				echo "<br />";
			}
		}

		function is_assoc($array) {
			return (bool)count(array_filter(array_keys($array), 'is_string'));
		}
		// print_users($clients);
		print_users($clients_associative);

		// is_assoc($users);
		// echo array_keys($users);

		$array = array(0 => 100, "color" => "red");
		print_r(array_keys($array));

		$array = array("blue", "red", "green", "blue", "blue");
		print_r(array_keys($array, "blue"));

		$array = array("color" => array("blue", "red", "green"),
		               "size"  => array("small", "medium", "large"));
		print_r(array_keys($array));
	?>
</p>
<h1>Average Demo</h1>
<p>
	<? 
		$sample = array(10, 3, 5, 8, 4, 2, 1, 333);
		$output = average($sample);
		echo $output;

		function average($nums) {
			$sum = 0;
			
			// for ($i = 0; $i < count($nums); $i++) {
			// 	$sum += $nums[$i];
			// }
			// return $sum / count($nums);
			
			foreach($nums as $value) {
				$sum += $value;
				echo $sum . "<br />";
			}
			return $sum / count($nums);
		}
	?>
</p>