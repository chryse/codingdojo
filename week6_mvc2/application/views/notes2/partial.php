<?php
	foreach($notes as $note) {
?>
	<div class="note">
		<h4><?= $note["title"]; ?></h4>
		<form method="post" action="/notes2/edit">
			<div class="form-group">
				<textarea name="description" class="form-control"><?=$note["description"];?></textarea>
				<input type="hidden" name="id" value="<?= $note['id']; ?>">
			</div>
		</form>

		<form method="post" action="/notes2/delete">
			<div class="form-group">
				<input type="hidden" name="id" value="<?= $note['id']; ?>" class="form-control">
			</div>
			<div class="form-group text-right">
				<button type="submit" class="btn btn-primary"><i class="fa fa-trash"></i></button>
			</div>
		</form>
	</div>
<?php
	}
?>