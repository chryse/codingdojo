<div id="pagination"><?= $links; ?></div>
<table class="table">
	<thead>
		<tr>
			<th>Lead ID</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Registered Date</th>
			<th>Email</th>
		</tr>
	</thead>
	<tbody>
<?php
	foreach($leads as $lead) {
?>
				<tr>
					<td><?= $lead["leads_id"] ?></td>
					<td><?= $lead["first_name"] ?></td>
					<td><?= $lead["last_name"] ?></td>
					<td><?= $lead["registered_datetime"] ?></td>
					<td><?= $lead["email"] ?></td>
				</tr>
<?php
	}
?>
	</tbody>
</table>