<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>User Review</title>
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
	<div class="row">
		<h3>User Info</h3>
		<ul>
			<li>User Alias : <?= $user["alias"]?></li>
			<li>Name : <?= $user["name"]?></li>
			<li>Email : <?= $user["email"]?></li>
			<li>Total Review : <?= $total_review["count"]?></li>
		</ul>

		<h3>Posted Reviews on the following books</h3>
		<ul>
	<?php
		foreach($reviewed_books as $book) {
	?>
			<li><a href="/books/<?=$book['book_id']?>"><?=$book["title"]?></a></li>
	<?php		
		}
	?>
		</ul>
	</div>
</div>	
</body>
</html>