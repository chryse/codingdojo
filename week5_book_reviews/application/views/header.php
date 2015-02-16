<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?= $page_title?></title>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	<link href="/assets/style.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
	<script>
		$(document).ready(function() {
			$(document).on("submit", "form#delete", function() {
				$.ajax({
					url: $(this).attr("action"),
					type: "POST",
					data: $(this).serialize()
				}).done(function(data) {
					console.log(data);
					$("div#review-list").html(data);
				});
				return false;
			});

			// $(document).on("change", "div.note textarea", function() {
			// 	$(this).parent().submit();
		});

	</script>
</head>