
<h3>Reviews</h3>
<?php
	foreach($books as $book) {
?>
	<hr/>
	<p>Rating: <?= $book["rating"]?></p>
	<p>
		<a href="/users/<?= $book["user_id"]?>">
			<?= $book["name"]?><br />
		</a> says <?= $book["review"]?>
	</p>
<?php
		if($book["user_id"] == $this->session->userdata("user")["id"]) {
?>
		<form id="delete" method="post" action="/books/delete">
			<input name="book_id" type="hidden" value="<?= $book['book_id']?>">
			<input name="user_id" type="hidden" value="<?= $book['user_id']?>">
			<input type="submit" value="Delete this Review">
		</form>
<?php
		}
?>
		<p>Posted on <?=$book["created_at"]?></p>	
<?php
	}
?>