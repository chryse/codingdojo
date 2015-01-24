<h1>Create a function called "multiply" that reads each value in the array and returns an array where each value has been multipled by 5.</h1>
<p>$a = [2, 4, 10, 16], factor = 5</p>
<?php
	function multiply($array, $factor) {
		for($i = 0; $i < count($array); $i++) {
			$array[$i] *= $factor;
		}
		return $array;
	}
	$a = array(2, 4, 10, 16);
	$b = multiply($a, 5);
	echo var_dump($b);
?>