<?php
function fibonacci($num) {
	$arr = [];
	
	if($num == 0) {
		$arr = [];
		return $arr;
	}
		
	else if($num == 1) {
		$arr[] = 0;
		$arr[] = 1;
		return $arr;
	}

	else if($num == 2) {
		$arr[] = 0;
		$arr[] = 1;
		return $arr;
	}
		
	else {
		$arr = fibonacci($num -1);
		$new = $arr[count($arr) -2] + $arr[count($arr) -1];
		$arr[] = $new;
	}
	return $arr;
}

function fibo($num) {
	$time_start = microtime_float();
	if ($num == 0) {
		$time_end = microtime_float();
		$time_elapsed = $time_end - $time_start;
		echo "Elapsed time in seconds: " . $time_elapsed . "<br />";
		return 0;
	}
	else if ($num == 1) {
		return 1;
	}
	else {
		return fibo($num -1) + fibo($num -2);
	}
}

echo fibo(50);

// print_array(fibonacci(100000));


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

function microtime_float() {
    list($usec, $sec) = explode(" ", microtime());
    return ((float)$usec + (float)$sec);
}
?>