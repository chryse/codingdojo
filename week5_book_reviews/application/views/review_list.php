<h3 class="text-center">Review of <?=$books[0]["title"]?></h3>
<h4 class="text-right"><?=$books[0]["author"]?></h4>
<?php
	foreach($books as $book) {
?>
	<hr/>
	<p><a href="/users/<?= $book["user_id"]?>"><?= $book["name"]?></a> Rating: <?= $book["rating"]?></p>
	<p>
		<?= $book["review"]?>
	</p>
<?php
		if($book["user_id"] == $this->session->userdata("user")["id"]) {
?>
		<form id="delete" method="post" action="/books/delete">
			<input name="book_id" type="hidden" value="<?= $book['book_id']?>">
			<input name="user_id" type="hidden" value="<?= $book['user_id']?>">
			<div class="text-right">
				<button class="btn btn-primary" type="submit">Delete this Review</button>
			</div>
		</form>
<?php
		}
?>
		<p>Posted on <?=$book["created_at"]?></p>
<?php
	}
?>