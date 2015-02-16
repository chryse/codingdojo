<table class="table table-striped table-hover">
				<thead>
					<tr>
						<td>Alias</td>
						<td colspan="2">Action</td>
					</tr>
				</thead>
				<tbody>
<?php
			foreach($friends as $friend) {
?>
					<tr>
						<td><?= $friend["alias"]?></td>
						<td><a href="/user/<?= $friend["id"] ?>">View Profile</a></td>
						<td>
							<form id="delete" method="post" action="delete">
								<input name="friend_id" type="hidden" value='<?= $friend["id"]?>'>
								<button class="btn btn-primary" type="submit">Remove as Friend</button>
							</form>
						</td>
					</tr>
<?php
			}
?>
	</tbody>
</table>