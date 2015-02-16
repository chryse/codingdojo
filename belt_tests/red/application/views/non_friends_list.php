<table class="table table-striped table-hover">
				<thead>
					<tr>
						<td>Alias</td>
						<td>Action</td>
					</tr>
				</thead>
				<tbody>
<?php
				foreach($non_friends as $non_friend) {				
?>
					<tr>
						<td><a href="/user/<?= $non_friend["id"] ?>">
								<?= $non_friend["alias"] ?>
							</a>
						</td>
						<td>
							<form id="add" method="post" action="add">
								<input name="non_friend_id" type="hidden" value='<?= $non_friend["id"]?>'>
								<button class="btn btn-success">Add as Friend</button>
							</form>
							
						</td>
					</tr>
<?php
				}
?>
				</tbody>
</table>