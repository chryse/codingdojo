<?php
	$info = [
				 ["state" => "CA", "city" => "San Francisco", "temp" => "1"],
				 ["state" => "MA", "city" => "Boston", "temp" => "2"],
				 ["state" => "IL", "city" => "Chicago", "temp" => "3"],
				 ["state" => "TX", "city" => "Austin", "temp" => "4"],
				 ["state" => "CA", "city" => "Los Angeles", "temp" => "5"],
				 ["state" => "NY", "city" => "New York", "temp" => "6"],
				];
?>

<table>
	<thead>
		<tr>
			<th>State</th>
			<th>City</th>
			<th>Temp</th>
		</tr>
	</thead>
	<tbody>
<?php
	foreach($info as $value) {
?>
		<tr>
			<td><?= $value["state"]; ?></td>
			<td><?= $value["city"]; ?></td>
			<Td><?= $value["temp"]; ?></td>
		</tr>	
<?php
		// echo $value["state"] . " " . $value["city"] . " " . $value["temp"] . "<br />";
	}
?>
	<tbody>
</table>