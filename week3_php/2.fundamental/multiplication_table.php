<!DOCTYPE html>
<html>
<head>
	<title>Multiplication Table</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="description" content="">
    <style>
    	strong {
    		color: #222;
    	}
        table {
        	border-spacing: 0;
        }
        tr:first-child td {
        	border-top: 1px solid #aaa;
        }
        tr:nth-child(2n+1) {
        	background: lightgrey;
        }
        td {
        	margin: 0;
        	width: 40px;
        	height: 40px;
        	text-align: center;
        	/*border-top: 1px solid #aaa;*/
        	border-bottom: 1px solid #aaa;
        	border-right: 1px solid #aaa;
        }
        td:first-child {
        	border-left: 1px solid #aaa;
        }
    </style>
</head>
<body>
	<h1>Multiplication Table</h1>
	<table>
		<?php
			$output = 0;
			for($i = 0; $i < 10; $i++) {
		?>
		<tr>
		<?php
				for($j = 0; $j < 10; $j++) {
		?>
			<td>
		<?php
					// check first row and first column
					if ($i == 0 && $j == 0) {
						$output = "";
					}
					// check first row
					else if ($i == 0) {
						$output = $j;
		?>
				<strong><?= $output; ?></strong>
		<?php
					}
					// check first column
					else if ($j == 0) {
						$output = $i;
		?>
				<strong><?= $output; ?></strong>
		<?php
					}
					else {
						$output = $i * $j;
						echo $output;
					}
				}
		?>
			</td>
		</tr>
		<?php		
			}
		?>
	</table>
</body>
</html>