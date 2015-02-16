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
</head>
<body>
<header class="navbar">
	<div class="container">
		<div class="navbar-right">
			<ul class="nav navbar-nav">
				<li><a href="/books/add">Add Book and Review</a></li>
				<li><a href="/logout">Logout</a></li>
			</ul>
		</div>
	</div>
</header>

<div id="main" class="container">
	<h1>Welcome! <?= $name ?></h1>
	<div class="row">
		<div class="col-md-6">
<?php
		for($i = 0; $i < 3; $i++) {
?>
			<h3><a href="/books/<?= $books[$i]['book_id']?>"><?= $books[$i]["title"]?></a></h3>
			<P>rating: <?= $books[$i]["rating"]?></p>
			<h5>
				<a href="/users/<?= $books[$i]['user_id']?>">
					<?= $books[$i]["name"]?>
				</a> says: <?= $books[$i]["review"]?>
			</h5>
			<p>Posted on <?=$books[$i]["created_at"]?></p>
			<hr />
<?php
		}
?>
		</div>

		<div class="col-md-6">

			<h3>Other Books with Reviews</h3>
			<div class="list">
<?php
			for($j = 3; $j < count($books); $j++) {
?>						
				<a href="/books/<?=$books[$j]["book_id"]?>">
					<?=$books[$j]["title"]?>
				</a><br />
<?php
			}
?>
			</div>

		</div>
	</div>
</div>	
</body>
</html>