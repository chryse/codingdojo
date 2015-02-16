<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Books Home</title>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	<link href="/assets/style.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
	<script>
		$(document).ready(function() {
			$(document).on("submit", "form#delete", function() {
				$.ajax({
					url: $(this).attr("action"),
					type: "POST",
					data: $(this).serialize()
				}).done(function(data) {
					console.log(data);
					$("div#review-list").html(data);
				});
				return false;
			});

			// $(document).on("change", "div.note textarea", function() {
			// 	$(this).parent().submit();
		});

	</script>
</head>
<body>
<header class="navbar">
	<div class="container">
		<div class="navbar-right">
			<ul class="nav navbar-nav">
				<li><a href="/books">Home</a></li>
				<li><a href="/books/add">Add Book and Review</a></li>
				<li><a href="/logout">Logout</a></li>
			</ul>
		</div>
	</div>
</header>

<div id="main" class="container">
	<div class="row">
		<div class="col-md-6">
			<div id="review-list">
				<?= include("review_list.php") ?>
			</div>
		</div>

		<div class="col-md-6">
			<h3>Add a Review</h3>
			<form method="post" action="/books/add_review">
				<div class="form-group">
					<textarea class="form-group" name="review" cols="50" rows="5"></textarea>
				</div>
				<div class="form-group">
					<select name="rating">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
					</select>
				</div>
				<div class="form-group text-right">
					<input type="hidden" name="book_id" value="<?= $books[0]["book_id"]?>">
					<input type="hidden" name="user_id" >
					<input type="hidden" name="action" value="add">
					<button class="btn btn-primary" type="submit">Add Review</button>
				</div>
			</form>
		</div>
	</div>
</div>	
</body>
</html>