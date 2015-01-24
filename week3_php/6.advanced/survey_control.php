<?php
	session_start();
	// var_dump($_POST);
	if(isset($_POST["count"])) {
		$_SESSION["count_submission"]++;
	}
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Survey Form</title>
    <meta charset="utf-8">
    <style>
    	* {
    		box-sizing: border-box;
    		-webkit-box-sizing: border-box;
    		-moz-box-sizing: border-box;
    	}
    	body {
    		font-size: 1.2em;
    		font-family: sans-serif;
    	}
        #wrapper {
            width: 700px;
            margin: 0 auto;
        }

        table {
        	border-spacing: 2px;
        	width: 100%;
        }

        td {
        	border: 1px solid #aaa;
        	padding: 10px;
        	text-align: center;
        }

        button {
        	/*width: 0px;*/
        	padding: 10px;
        	background: #0be;
        	float: right;
        	font-size: 1.2em;
        	border-radius: 10px;
        }

        a {
        	color: #000;
        }

        div.box {
        	padding: 20px;
        	background: #0be;
        	color: #fff;
        }

       

    </style>
</head>
<body>
	<div id="wrapper">
		<div class="box">Thanks for submitting this form! You have submitted this form <?= $_SESSION["count_submission"] ?> times now.</div>
		<div>
			<h3>Submitted Information</h3>
			<table>
<?php
				foreach($_POST as $key => $value) {
					if($key != "count") {
?>
				<tr>
					<td><?= $key; ?></td>
					<td><?= $value; ?></td>
				</tr>
<?php
					}
				}
?>
			</table>
			<button><a href="survey.php">Go Back</a></button>
		</div>
	</div>

</body>
</html>