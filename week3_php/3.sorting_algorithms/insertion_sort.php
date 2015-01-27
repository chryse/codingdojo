<h1>Insertion Sort</h1>

<?php

$array = array();
for ($k = 0; $k < 1000; $k++) {
	$array[] = rand(1,10000);
}

echo "input: <br/>";
array_display($array);
echo "<br /><br /><hr />output: <br/>";
array_display(insertion_sort($array));


function insertion_sort($a) {
	$time_start = microtime_float();

	$len = count($a);
	for ($i = 0; $i < $len-1; $i++) {
		for ($j = $i + 1; $j > 0; $j--) {
			if ($a[$j] < $a[$j-1]) {
				$temp = $a[$j];
				$a[$j] = $a[$j-1];
				$a[$j-1] = $temp;
			}
			else {
				 break;
			}
		}
	}
	$time_end = microtime_float();
	$time_elapsed = $time_end - $time_start;
	echo "Elapsed time in seconds: " . $time_elapsed . "<br />";
	return $a;
}


function array_display($arr) {
	echo "[ ";
	for($i = 0; $i < count($arr); $i++) {
		if ($i == count($arr)-1) {
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