<h1>CSV</h1>

<?php
	$data = get_csv("us-500.csv");
	$row_len = count($data);
	$col_len = count($data[0]);

	for($i = 1; $i < $row_len; $i++) {
?>
<h2>Record <?= $i ?></h2>
<ul>
<?php
		for($j = 0; $j < $col_len; $j++) {
?>
	<li><?= $data[0][$j] ?>: <?= $data[$i][$j] ?></li>
<?php
		}
?>
</ul>
<?php
	}
?>	

<?php
	// get csv
	function get_csv($file) {
		// set this configuration to detect '\r'
		ini_set('auto_detect_line_endings', true);

		$result = [];

		if (($handle = fopen($file, "r")) !== FALSE) {
		    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
		        $result[] = $data;
		        // var_dump($data);
		        // echo "<br /><br />";
		    }
		    fclose($handle);
		}
		return $result;
	}
?>
