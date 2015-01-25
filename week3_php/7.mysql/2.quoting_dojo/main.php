<?php
	require("connection.php");

	include("header.php");
?>
<body>
	<div id="wrapper">
		<h1>Here are the awesome quotes!</h1>
		<?php
			$get_quotes = "select * from quotes";
			$all_quotes = fetch_all($get_quotes);

			if(count($all_quotes) > 0) {
				for($i = count($all_quotes) -1; $i >= 0; $i--) {
					// date formatting
					$date = strtotime($all_quotes[$i]["create_at"]);
					$formated_date = date("g:i a j F Y", $date);
					
					echo "<div class='result'>\"{$all_quotes[$i]["quote"]}\"<br />" 
						. "<span>- {$all_quotes[$i]["name"]} " . 
						$formated_date
						. "</span></div>";
				}	
			}
			else {
				echo "<div class='result'>There is no data retrieved.</div>";
			}
			
		?>
	</div>
</body>