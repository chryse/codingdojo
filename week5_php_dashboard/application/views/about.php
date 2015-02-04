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
		<div class="col-md-6">
			<h1 class="text-left"><?= $title; ?></h1>
			<p>
				I enjoy my proficiency in multiple programming languages and platforms to develop and design creative and interactive software programs based on UX and UI to the software programs. I've been working as a Frontend Web Developer. I gained my Bachelor degree of Computer Science in Korea, and Masters of Professional Studies in Digital Media at Northeastern University in 2012. My studies concentrated on Interactive Design. Steve Jobs’ quote, “Design is not just what it looks like and feels like. Design is how it works” is my motto.
			</p>	
		</div>		
	</div>
	<?= $is_logged_in; ?>
	<? include("footer.php") ?>
</body>
</html>