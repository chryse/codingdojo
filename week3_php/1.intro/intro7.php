<h1>Create a new array called $users that have the following keys and values</h1>
<p>$users['first_name'] = "Michael";<br />
	$users['last_name'] = "Choi";
</p>
<h1>Create a function where you can pass this $users and which would print an output that looks like below</h1>
<p>There are 2 keys in this array: first_name, last_name<br/>
	The value in the key 'first_name' is 'Michael'.<br />
	The value in the key 'last_name' is 'Choi'.
</p>
<hr />
<h1>PHP output</h1>
<?php
	$users = array("first_name" => "Micheal", "last_name" => "Choi");
	function show_users($array) {
		echo "There are " . count($array) . " keys in this array: ";
		foreach(array_keys($array) as $key) {
			echo $key . " ";
		}
		echo "<br />";
		foreach($array as $key => $value) {
			echo "The value in the key '" . $key . "' is '" . $value ."'.<br />";
		}
	}

	show_users($users);

?>
