<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?= $title ?></title>
    <meta charset="utf-8">
    <link href="/assets/bootstrap.min.css" type="text/css" rel="stylesheet">
    <link href="/assets/style.css" type="text/css" rel="stylesheet">
</head>
<body>
	<? include("header.php") ?>

	<div class="container padding-top">
		<div class="row">
			<div class="col-md-12">
				<h1 class="text-left"><?= $title ?></h1>
				<?= $add_user; ?>
				<?= $user_list; ?>
			</div>
		</div>
	</div>

	<? include("footer.php") ?>
</body>
</html>