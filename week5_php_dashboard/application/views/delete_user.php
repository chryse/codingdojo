<?php
defined("BASEPATH") OR exit("No direct script access allowed.");
?>
<html lang="en">
<head>
	<title><?= $title; ?></title>
	<meta charset="utf-8">
	<link href="/assets/bootstrap.min.css" type="text/css" rel="stylesheet">
	<link href="/assets/style.css" type="text/css" rel="stylesheet">
</head>
<body>
	<? include("header.php"); ?>

	<div class="container padding-top">
		<div class="row">
			<div class="col-md-12">
				<h1 class="text-left"><?= $title ?></h1>
				<table class="table table-hover">
					<thaed>
						<tr>
							<th>ID</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Email</th>
							<th>Created At</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><?= $user["id"]; ?></td>
							<td><?= $user["first_name"] ?></td>
							<td><?= $user["last_name"]; ?></td>
							<td><?= $user["email"]; ?></td>
							<td><?= $user["created_at"]; ?></td>
						</tr>
					</tbody>
				</table>
				<h4>Are you sure to remove?</h4>
				<form action="/users/remove_process" method="post">
					<input type="hidden" name="user_id" value="<?= $user["id"]; ?>">
					<button class="btn btn-danger" name="submit" type="submit" value="submit">Remove</button>
					<button class="btn btn-success">Return to Dashboard</button><a/>
				</form>
				
			</div>
		</div>
	</div>

</body>
</html>