<?php
	function factorial($number) {
		if($number == 0)
			return 1;
		return $number * factorial($number-1);
	}

	echo factorial(10);
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
?>