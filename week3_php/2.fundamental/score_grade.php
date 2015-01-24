<!DOCTYPE html>
<html>
<head>
	<title>Score and Grade</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="description" content="">
    <style>
    	h2 {
    		font-size: 1.1em;
    	}
    	h3 {
    		font-size: 1.0em;
    		color: grey;	
    	}
    	#grade-table {
    		width: 1200px;
    	}
    	#grade-table div {
    		width: 200px;
    		display: inline-block;
    		margin: 2px;
    		padding: 5px;
    		float: left;
    		border: 1px solid #aaa;
    	}
    </style>
</head>
<body>
	<h1>Score and Grade</h1>
	<?php
		function grade($score) {
			$result = ["score" => $score];
			
			if($score < 70) {
				$result = "D";
			}
			else if($score >= 70 && $score <= 79) {
				$result = "C";
			}
			else if($score >= 80 && $score <= 89) {
				$result = "B";
			}
			else if($score >= 90 && $score <= 100) {
				$result = "A";
			}
			return $result;
		}

		function generater() {
			for ($i = 0; $i < 100; $i++) {
				$score = rand(50, 100);
				echo "<div><h2>Your Score: " . $score . "/100</h2>";
				echo "<h3>Your grade is " . grade($score) . ".</h3></div>";
			}
		}
	?>
	<div id="grade-table">
		<?= generater(); ?>
	</div>
</body>
</html>