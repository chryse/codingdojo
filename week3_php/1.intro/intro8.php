<h1>Create an array that contains all the odd numbers between 1 to 20,000. var_dump this array at the end to make sure you did it correctly</h1>

<?php
	$array = array();
	for($i = 1; $i <= 20000; $i++) {
		if($i % 2 == 1) {
			$array[] = $i;
		}
	}
	var_dump($array);
?>