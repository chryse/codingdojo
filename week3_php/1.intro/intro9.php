<h1>Create a program that counts from 1 to 2000. As it loops through each number, have your program generate the numbers and whether it's an odd number or whether it's an even number</h1>
<?php
	for($i = 1; $i <= 20000; $i++) {
		if ($i % 2 == 1) {
			echo "Number is " . $i . ". This is an odd number.<br />";
		}
		else {
			echo "Number is " . $i . ". This is an even number.<br />";
		}
	}
?>