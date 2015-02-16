<?php $this->load->view("header")?>
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