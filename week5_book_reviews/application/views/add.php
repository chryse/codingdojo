<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Add Book and Review</title>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	<link href="/assets/style.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
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
			<label class="col-md-2 label-control">Book Title</label>
			<div class="col-md-5">
				<input class="form-control" type="text" name="title">
			</div>
		</div>
		<label>Author</label>
		<label>Choose from the list</label>
		<select name="author_option">
			<option value="Name A">Name A</option>
			<option value="Name B">Name B</option>
			<option value="Name C">Name C</option>
			<option value="Name D">Name D</option>
			<option value="Name E">Name E</option>
			<option value="Name F">Name F</option>
		</select>
		<label>Or add a new author</label>
		<input type="text" name="author">
		<label>Review</label>
		<textarea name="review"></textarea>
		<label>Rating</label>
		<select name="rating">
			<option value="1"><i class="icon-star"></i></option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
		</select>
		<input type="hidden" name="action" value="add">
		<button class="btn btn-primary" type="submit">Add Book and Review</button>
	</form>
</div>
</body>
</html>