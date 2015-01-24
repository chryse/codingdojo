#!/usr/bin/php -e
<?php
	require("simple_form_dom.php");
	$html = file_get_html("http://hyunjunkim.com");

	$data = [];
	foreach($html -> find("img") as $key => $element) {
		// var_dump($key . " " .$element);

		$pattern = "/http/";
		$url = $element -> src;
		if (preg_match ($pattern, $url)) {
			$data[] = "<img src='$url' /><br />";
		}
		else {
			$data[] = "<img src='http://hyunjunkim.com/$url' /><br />";
		}
	}


	$email = "timeisonourside@gmail.com";
	$subject = "my pictures in hyunjunkim.com";
	$headers = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8858-1' . "\r\n";

	mail($email, $subject, implode("", $data), $headers);
?>
