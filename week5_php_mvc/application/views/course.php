<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Course</title>
	<link href="/assets/bootstrap.min.css" rel="stylesheet">
	<style>
		.bg-danger {
			padding: 20px;
			border-radius: 5px;
		}
		button {
			outline: none;
		}
	</style>
</head>
<body>


<div class="container">
	<h1>Courses</h1>
	<h3>Add a new user</h3>
	<div class="row">
		<div class="col-sm-6">
		<?php

			if($errors != null) {
				echo "<p class='bg-danger'>$errors[0]</p>";
			}

		?>
		</div>
	</div>
	<form method="post" action="course-process" class="form-horizontal">
		<div class="form-group">
			<label class="col-sm-1">Title:</label>
			<div class="col-sm-5">
				<input class="form-control" name="title">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-1">Description:</label>
			<div class="col-sm-5">
				<input class="form-control" name="description">
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-6 text-right">
				<input type="hidden" name="submit" value="submit">
				<button type="submit" name="add" class="btn btn-success">Add</button>
			</div>
		</div>
	</form>
	<h3>Courses</h3>
	<?= $result_table; ?>
	<div class="row text-right">
		<a href="/"><button class="btn-primary">Go Back</button></a>
	</div>
</div>

</body>
</html>