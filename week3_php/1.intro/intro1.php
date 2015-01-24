<h1>Print all the odd numbers from 1 to 1000</h1>

<?php
	for($i = 1; $i <= 1000; $i++) {
		if($i % 2 == 1) {
			echo $i . "<br />";
		}
	}
?>