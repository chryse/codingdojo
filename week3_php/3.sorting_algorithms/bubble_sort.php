<h1>Bubble Sort Algorithm</h1>

<?php

$arr = array();
for($k = 0; $k < 10000; $k++) {
	$arr[] = rand(1, 100);
}

echo "input: <br />";
array_display($arr);
echo "<br /><br /><hr />output :<br />";
array_display(bubble_sort($arr));

function bubble_sort($array) {
	$time_start = microtime_float();

	$len = count($array);
	$is_swapped = false;

	if(!$is_swapped) {

		for($i = 0; $i < $len; $i++) {
		
			for($j = 0; $j < $len; $j++) {
				if($array[$j] > $array[$i]) {
					$tmp = $array[$j];
					$array[$j] = $array[$i];
					$array[$i] = $tmp;
					$is_swapped = true;
				}
			}	
		}	
	}

	$time_end = microtime_float();
	$time_elapsed = $time_end - $time_start;
	echo "Elapsed time in seconds: " . $time_elapsed . "<br />";
	return $array;
}


function array_display($arr) {
	echo "[ ";
	for($i = 0; $i < count($arr); $i++) {
		if($i == count($arr) -1 ) {
			echo $arr[$i];
		}
		else {
			echo $arr[$i] . ", ";
		}
	}
	echo " ]";
}

function microtime_float() {
	list($usec, $sec) = explode(" ", microtime());
	return ((float)$usec + (float)$sec);
}

?>
