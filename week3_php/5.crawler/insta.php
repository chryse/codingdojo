<!-- #!/usr/bin/php -e -->
<?php
	// require("simple_form_dom.php");
	// $html = file_get_html("http://instagram.com/toalicemin");

	// var_dump($html);
	// $photos = [];
	// foreach($html -> find('div[src]') as $element) {
	// 	// echo $element->src . "1<br />";
	//     // $item['intro']    = $element->find('div.intro', 0)->plaintext;
	//     // $item['details'] = $element->find('div.details', 0)->plaintext;
	//     $photos[] = $element;

	// }
	// var_dump($photos);
	// echo(count($photos));
	

	// $data = [];
	// foreach($html -> find("img") as $key => $element) {
	// 	// var_dump($key . " " .$element);

	// 	$pattern = "/http/";
	// 	$url = $element -> src;
	// 	if (preg_match ($pattern, $url)) {
	// 		$data[] = "<img src='$url' /><br />";
	// 	}
	// 	else {
	// 		$data[] = "<img src='http://hyunjunkim.com/$url' /><br />";
	// 	}
	// }

	// <div src="http://scontent-a-lax.cdninstagram.com/hphotos-xpa1/t51.2885-15/s306x306/e15/10731797_1507774242814700_1145628777_n.jpg" class="pgmiThumb tThumbImage Image" data-reactid=".0.0.1.3.0.0.$2.0:$0.0.1.0"><div data-reactid=".0.0.1.3.0.0.$2.0:$0.0.1.0.0"><div class="iImage" id="iImage_24" style="background-image:url(http://scontent-a-lax.cdninstagram.com/hphotos-xpa1/t51.2885-15/s306x306/e15/10731797_1507774242814700_1145628777_n.jpg);" data-reactid=".0.0.1.3.0.0.$2.0:$0.0.1.0.0.$=1$iImage_24:0"></div></div></div>


	$email = "timeisonourside@gmail.com";
	$subject = "my pictures in hyunjunkim.com";
	$headers = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8858-1' . "\r\n";

	// mail($email, $subject, implode("", $data), $headers);


	//see http://www.php.net/manual/en/function.curl-setopt.php for more info
    $url = "http://instagram.com/toalicemin";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); 
    $data = curl_exec($ch);
    $info = curl_getinfo($ch);  
    curl_close($ch);

    echo "<h1>Data</h1>";
    echo "<pre>".htmlentities($data)."</pre>";
?>
