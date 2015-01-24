<h1>Print all the multiples of 5 from 5 to 1,000,000</h1>
<?php
	for($i = 1; $i <= 1000000; $i++) {
		if($i % 5 == 0) {
			echo $i . " ";
		}
	}

?>