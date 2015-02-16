<?php
defined("BASEPATH") OR exit("No direct script access allowed.");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Leads Search and Pagination</title>
	<link href="/assets/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="/assets/font-awesome.min.css" rel="stylesheet" type="text/css">
	
	<script src="/assets/jquery-2.1.3.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$("form").submit(function() {
				$.ajax({
					url: $(this).attr("action"),
					type: "POST",
					data: $(this).serialize()
				}).done(function(data) {
					$("#result").html(data);
				})
				// return false;
			})
		})
	</script>
	<style>
		#pagination {
			text-align: right;
			margin-right: 20px;
		}
		#pagination a, #pagination strong {
			padding: 0 10px;
			border-right: 1px solid silver;
		}

		#pagination a:first-child, #pagination a:last-child {
			border-right: 0px;
		}

	</style>
</head>
<body>
	<h1>Leads Search and Pagination</h1>
	<form method="post" action="/searches/filter">
		<label>Name:</label>
		<input type="text" name="name" value="mark">
		<input type="text" name="from" value="2000-01-01">
		<input type="text" name="to" value="2015-01-01">
		<select name="page_size">
			<option>10</option>
			<option>20</option>
			<option>30</option>
			<option>40</option>
			<option>50</option>
		</select>
		<input type="submit">
	</form>
	<div id="result">
		<?php include("partial.php") ?>
	</div>
</body>
</html>