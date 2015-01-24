<h1>Print the average of the values in the array called A</h1>
<p>A = [1, 2, 5, 10, 255, 3]</p>
<?php
	$a = [1, 2, 5, 10, 255, 3];
	$number_of_array = count($a);
	$sum = 0;
	$avg = 0;
	foreach($a as $value) {
		$sum += $value;
	}
	$avg = $sum / $number_of_array;
	echo $avg;
?>