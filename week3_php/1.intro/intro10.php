<!DOCTYPE html>
<html lang="en">
<head>
	<title>Understanding Foreach</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="description" content="">
    <style>
    	div {
    		display: inline-block;
    		width: 45%;
    		padding: 10px;
    		vertical-align: top;
    		border: 1px solid #aaa;
    	}
    </style>
</head>
<body>
	<h1>Understanding Foreach</h1>
	<div>
		<h2>Expected Outputs</h2>
		<ol>
		<li>
			0 - 1<br />
			1 - 3<br />
			3 - 5<br />
			7 - 7<br />
		</li>
		<li>
			1<br />
			3<br />
			5<br />
			7<br />
		</li>
		<li>
			h1 - Dojo<br />
			awesome - game<br />
		</li>
		<li>
			Dojo<br />
			game<br />
		</li>
		<li>
			hi<br />
			awesome<br />
		</li>
		<li>
			Key is 0<br />
			var_dumping value "display dumping result of array(1,3 5)"<br />
			Key is 1<br />
			var_dumping value "display dumping result of array(2,4,6)"<br />
			Key is 2<br />
			var_dumping value "display dumping result of array(3,6,9)"<br />
		</li>
		<li>
			var_dumping value "display dumping result of array(1,3 5)"<br />
			var_dumping value "display dumping result of array(2,4,6)"<br />
			var_dumping value "display dumping result of array(3,6,9)"<br />
		</li>
		<li>
			key is 0<br />
			hi - Dojo<br />
			game - awesome<br />
			key is 1<br />
			dude - fun<br />
			play - what?<br />
			key is 2<br />
			no - way<br />
			i am - confused?<br />
		</li>
		<li>
			hi - Dojo<br />
			game - awesome<br />
			dude - fun<br />
			play - what?<br />
			no - way<br />
			i am - confused?<br />
		</li>
		</ol>
	</div>
	<div>
		<h2>PHP Result</h2>
		<ol>
		<?php
			echo "<li>";
			$x = array(1,3,5,7);
			foreach($x as $key => $value) {
				echo $key . " - " . $value . "<br />";
			}
			echo "</li><li>";
			$x = array(1,3,5,7);
			foreach($x as $value) {
				echo $value ."<br />";
			}
			echo "</li><li>";
			$x = array("hi" => "Dojo", "awesome" => "game");
			foreach($x as $key => $value) {
				echo $key . " - " . $value ."<br />";
			}
			echo "</li><li>";
			$x = array("hi" => "Dojo", "awesome" => "game");
			foreach($x as $key => $value) {
				echo $value ."<br />";
			}
			echo "</li><li>";
			$x = array("hi" => "Dojo", "awesome" => "game");
			foreach($x as $key => $value) {
				echo $key ."<br />";
			}
			echo "</li><li>";
			$x = array( array(1,3,5), array(2,4,6), array(3,6,9) );
			foreach($x as $key => $value) {
				echo "Key is {$key}<br />";
				echo "var_dumping value";
				var_dump($value);
			}
			echo "</li><li>";
			$x = array( array(1,3,5), array(2,4,6), array(3,6,9) );
			foreach($x as $key => $value) {
				echo "var_dumping value";
				var_dump($value);
			}
			echo "</li><li>";
			$x = array( array("hi" => "Dojo", "game" => "awesome"), array("dude" => "fun", "play" => "what?"), array("no" => "way", "i am" => "confused?") );
			foreach($x as $key => $value) {
				echo "key is {$key}<br />";
				foreach($value as $key2 => $value2) {
					echo $key2 . " - " . $value2 . "<br />";
				}
			}
			echo "</li><li>";
			$x = array( array("hi" => "Dojo", "game" => "awesome"), array("dude" => "fun", "play" => "what?"), array("no" => "way", "i am" => "confused?") );
			foreach($x as $y) {
				foreach($y as $key => $value) {
					echo $key . " - " . $value . "<br />";
				}
			}
		?>
		</ol>
	</div>
</body>
</html>