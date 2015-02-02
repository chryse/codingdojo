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
		table {
			margin: 30px 0;
		}
		button {
			outline: none;
		}
	</style>
</head>
<body>


<div class="container">
	<div class="row">
		<div class="col-sm-10">
			<h3>Are you sure you want to delete the following course?</h3>
			<?= $course ?>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-3 col-sm-offset-2">
			<a href="<?= site_url("course"); ?>"><button type="submit" class="btn btn-primary">No</button></a>
		</div>
		<div class="col-sm5">
		<form action="<?= current_url(); ?>" method="post"><button type="submit" name="submit" value="delete" class="btn btn-warning">Yes, I want to delete this</button></form>
	</div>
	
	
</div>

</body>
</html>