<?php $this->load->view("header")?>
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
			<P>
				<a href="/users/<?= $books[$i]['user_id']?>"><?= $books[$i]["name"]?></a> rating: <?= $books[$i]["rating"]?>
			</p>
			<p>
				<?= $books[$i]["review"]?>
			</p>
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