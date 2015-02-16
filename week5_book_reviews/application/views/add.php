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
<?
	if($this->session->flashdata("add_errors")) {
		echo "<div class='bg-danger'><p>";
		echo $this->session->flashdata("add_errors");
		echo "</p></div>";
	}
?>
	<h1>Add a New Book Title and a Review</h1>
	<form class="form-horizontal" method="post" action="/books/add_process">
		<div class="form-group">
			<label class="col-md-2">Book Title</label>
			<div class="col-md-5">
				<input class="form-control" type="text" name="title">
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2">Author</label>
			<div class="col-md-5">
				<label>Choose from the list</label>
				<select class="form-control" name="author_option">
					<option value="Name A">Name A</option>
					<option value="Name B">Name B</option>
					<option value="Name C">Name C</option>
					<option value="Name D">Name D</option>
					<option value="Name E">Name E</option>
					<option value="Name F">Name F</option>
				</select>
				<label>Or add a new author</label>
				<input class="form-control" type="text" name="author">
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2">Review</label>
			<div class="col-md-5">
				<textarea class="form-control" rows="5" name="review"></textarea>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2">Rating</label>
			<div class="col-md-5">
				<select class="form-control" name="rating">
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
				</select>
			</div>
		</div>
		<div class="col-md-7 text-right">
			<input type="hidden" name="action" value="add">
			<button class="btn btn-primary" type="submit">Add Book and Review</button>
		</div>
	</form>
</div>
</body>
</html>