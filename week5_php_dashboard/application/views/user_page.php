<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?= $title; ?></title>
    <meta charset="utf-8">
    <link href="/assets/bootstrap.min.css" type="text/css" rel="stylesheet">
    <link href="/assets/style.css" type="text/css" rel="stylesheet">
</head>
<body>
	<? include("header.php") ?>

	<div class="container padding-top">
		<div class="row">
			<div class="col-md-4">
				<h1><?= $title; ?></h1>
				<table class="table table-bordered table-hover text-center">
					<tr>
						<td><strong>ID</strong></td>
						<td>#<?= $user["id"] ?></td>
					</tr>
					<tr>
						<td><strong>Name</strong></td>
						<td><?= $user["first_name"] ?> <?= $user["last_name"] ?></td>
					</tr>
					<tr>
						<td><strong>Email</strong></td>
						<td><?= $user["email"] ?></td>
					</tr>
					<tr>
						<td><strong>Registered at</strong></td>
						<td><?= $user["created_at"] ?></td>
					</tr>
					<tr>
						<td><strong>Description</strong></td>
						<td><?= $user["description"] ?></td>
					</tr>
				</table>
			</div>
			<div class="col-md-8">
				<h3>Leave a message for <?= $user["first_name"] . " " . $user["last_name"]; ?></h3>
				<form method="post" action="/messages/add_message">
					<div class="form-group">
						<textarea class="form-control" rows="5" cols="10" placeholder="Leave a message!" name="message"></textarea>
					</div>
					<div class="form-group text-right">
						<input type="hidden" name="user_written" value="<?= $user['id']; ?>">
						<input type="hidden" name="submit" value="<?= $current_url; ?>">
						<button class="btn btn-success" type="submit">Post</button>
					</div>
				</form>
				<?= $messages; ?>			
			</div>
		</div>
	</div>
	
<? include("footer.php") ?>
	
</body>
</html>