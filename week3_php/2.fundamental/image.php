<?php

	function draw_image($setting) {
		$captcha_img = imagecreate( 400, 300 );
		$background = imagecolorallocate( $captcha_img, $setting["background_color"][0], $setting["background_color"][1], $setting["background_color"][2] );
		$text_color = imagecolorallocate( $captcha_img, $setting["text_color"][0], $setting["text_color"][1], $setting["text_color"][2] );
		$line_color = imagecolorallocate( $captcha_img, $setting["line_color"][0], $setting["line_color"][1], $setting["line_color"][2] );
		imagestring( $captcha_img, 5, 120, 120, $setting["text"], $text_color );
		imagesetthickness ( $captcha_img, 10 );
		imageline( $captcha_img, 30, 150, 370, 150, $line_color );

		header( "content-type: image/png" );
		imagepng( $captcha_img );
		imagecolordeallocate( $line_color );
		imagecolordeallocate( $text_color );
		imagecolordeallocate( $background );
		imagedestroy( $captcha_img );
	}

	$pick_number = rand(0, 4);
	$settings = array(
					array(	"background_color" => [0, 0, 0],
							"text_color" => [255, 255, 255],
							"line_color" => [255, 0 , 0],
							"text" => "This is CAPTCHA1"
						 ),
					array(  "background_color" => [255, 0, 0],
							"text_color" => [255, 255, 255],
							"line_color" => [0, 255, 0],
							"text" => "This is CAPTCHA2"
						 ),
					array(	"background_color" => [0, 255, 0],
							"text_color" => [0, 0, 0],
							"line_color" => [255, 255, 255],
							"text" => "This is CAPTCHA3"
						 ),
					array(
							"background_color" => [0, 0, 255],
							"text_color" => [255, 255, 255],
							"line_color" => [255, 255, 0],
							"text" => "This is CAPTCHA4"
						 ),
					array(
							"background_color" => [255, 0, 255],
							"text_color" => [0, 0, 0],
							"line_color" => [255, 255, 255],
							"text" => "This is CAPTCHA5"
						)
					  );

	switch($pick_number) {
		case 0:
			draw_image($settings[0]);
			break;
		case 1:
			draw_image($settings[1]);
			break;
		case 2:
			draw_image($settings[2]);
			break;
		case 3:
			draw_image($settings[3]);
			break;
		case 4:
			draw_image($settings[4]);
			break;
	}
?>