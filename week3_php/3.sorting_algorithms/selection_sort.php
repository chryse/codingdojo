<h1>Selection Algorithm</h1>

<?php
$arr = array();
for($j = 0; $j < 10; $j++) {
	$arr[] = rand(1, 100);
}

echo "<hr /><strong>input:</strong><br />";
print_array($arr);

echo "<br /><br /><hr /><strong>Result:</strong><br />";
echo "<strong>normal version</strong>";
print_array(selection_sort($arr));
// echo "<hr />double data amount:";
// for($j = 0; $j < 1000; $j++) {
// 	$arr[] = rand(1, 10000);
// }
// print_array(selection_sort($arr));

echo "<hr /><strong>upgrade version</strong><br />";
print_array(selection_sort_upgrade($arr));
?>


<?php
// selection sort
function selection_sort($arr) {
	$time_start = microtime_float();

	$len_array = count($arr);
	for($i = 0; $i < $len_array; $i++) {		
		// echo "Iternation: " . $i . " / the length of the array excution " . ($len_array - $start_point) . "<br />";

		// need only index value which indicates where the lowest number is located.
		$min_index = $i;
		for($j = $i +1; $j < $len_array; $j++) {
			// Do NOT need to change the min value each nested loop is going on.
			// if($arr[$j] < $arr[$i]) {
			// 	$tmp = $arr[$j];
			// 	$arr[$j] = $arr[$i];
			// 	$arr[$i] = $tmp;
			// }
			if($arr[$j] < $arr[$min_index]) {
				$min_index = $j;
			}
			// echo "<strong>min: " . $arr[$start_point] . "</strong><br />";
		}
		//$tmp = $arr[$i];
		//$arr[$i] = $arr[$min_index];
		//$arr[$min_index] = $tmp;
		list($arr[$i], $arr[$min_index]) = array($arr[$min_index], $arr[$i]);
	}
	
	$time_end = microtime_float();
	$time_elapsed = $time_end - $time_start;
	echo "<br />Elapsed time in seconds: " . $time_elapsed . "<br>";
	return $arr;
}

//selection sort upgrade
function selection_sort_upgrade($arr) {
	$time_start = microtime_float();

	$len_array = count($arr);
	for($i = 0; $i < $len_array; $i++) {		

		// need only index value which indicates where the lowest number is located.
		$min_index = $i;
		// need only index value which indicates where the hightest number is located.
		$max_index = $i;

		for($j = $i +1; $j < $len_array -$i; $j++) {
			// Do NOT need to change the min value each nested loop is going on.
			if($arr[$j] < $arr[$min_index]) {
				$min_index = $j;
			}
			if($arr[$j] > $arr[$max_index]) {
				$max_index = $j;
			}
		}
		echo "i=$i j=$j, min: $arr[$min_index] max: $arr[$max_index]<br />";
		
		// swp max value with last value of the array
		$tmp1 = $arr[$len_array -1 -$i];
		$arr[$len_array -1 -$i] = $arr[$max_index];
		$arr[$max_index] = $tmp1;

		// swap min value with iteration start point
		$tmp = $arr[$i];
		$arr[$i] = $arr[$min_index];
		$arr[$min_index] = $tmp;


		


		print_array($arr);
		echo "<br />";
	}
	
	$time_end = microtime_float();
	$time_elapsed = $time_end - $time_start;
	echo "<br />Elapsed time in seconds: " . $time_elapsed . "<br>";
	return $arr;
}

// print array value in row
function print_array($array) {
	echo "[ ";
	for($i = 0; $i < count($array); $i++) {
		if ($i == (count($array) -1)) {
			echo $array[$i];
		}
		else {
			echo $array[$i] . ", ";
		}
	}
	echo " ]";
}

// Simple function to replicate PHP 5 behaviour
function microtime_float() {
    list($usec, $sec) = explode(" ", microtime());
    return ((float)$usec + (float)$sec);
}

?>
