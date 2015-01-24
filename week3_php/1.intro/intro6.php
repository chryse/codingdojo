<h1>Create a function called "print_list" that takes any array and prints each value in the array in &lt;li&gt;&lt;/li&gt;.</h1>
<ul>
<?php
	$a = array(2, 3, "hello");
	function print_list($array) {
		foreach($array as $value) {
			echo "<li>" . $value . "</li>";
 		}
	}
	print_list($a);
?>
</ul>