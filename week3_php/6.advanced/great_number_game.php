<?php
    session_start();

    // if game_start session is not initialized on session
    if(!isset($_SESSION["game_start"])) {
        $_SESSION["game_start"] = false;
    }

    if(!isset($_SESSION["remaining_guess"])) {
        $_SESSION["remaining_guess"] = ceil(log(100, 2));
    }

    // set game started
    if(!$_SESSION["game_start"]) {
        $_SESSION["correct_number"] = strval(rand(1, 100));
        
        // keep the right number not changing
        $_SESSION["game_start"] = true;
    }

    // reset game
    if(isset($_POST["reset"])) {
        $_SESSION["message"] = "";
        $_SESSION["result"] = "";
        $_SESSION["correct_number"] = strval(rand(1, 100));
        $_SESSION["remaining_guess"] = ceil(log(100, 2));
    }

    function low() {
        if(isset($_SESSION["result"])
            && $_SESSION["result"] == "low") {
            return "show";
        }
        else {
            return "unshow";
        }
   }

   function high() {
        if(isset($_SESSION["result"])
            && $_SESSION["result"] == "high") {
            return "show";
        }
        else {
            return "unshow";
        }
   }

   function correct() {
        if(isset($_SESSION["result"])
            && $_SESSION["result"] == "correct") {
            return "show";
        }
        else {
            return "unshow";
        }
   }
   // var_dump($_SESSION);
   // var_dump($_POST);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Great Number Game</title>
    <meta charset="utf-8">
    <style>
    	* {
    		box-sizing: border-box;
    		-webkit-box-sizing: border-box;
    		-moz-box-sizing: border-box;
            font-family: sans-serif;
    	}
    	body {
    		font-size: 1.2em;
    		font-family: helvetica, sans-serif;
    	}
        #wrapper {
            width: 800px;
            height: 500px;
            margin: 0 auto;
            padding: 30px;
            text-align: center;
            border: 1px solid #aaa;
            position: relative;
        }

        form {
            display: inline-block;
            width: 33.33%;
            margin: 0;
            padding: 20px;
            text-align: center;
            float: left;
        }

        form.reset-form {
            width: 100%;
        }

        input {
        	display: block;
            width: 100%;
        	padding: 10px;
        	margin: 10px 0;
        	font-size: 1.0em;
        }

        input.submit, input.reset {
        	margin: 10px auto;
        	border-radius: 10px;
        	border: 1px solid #000;
        	background: #0be;
        	color: #fff;
        	width: 100px;
        	outline: none;
        }

        input.reset {
            width: 120px;
            border: 1px solid #fff;
        }

        .side-box {
            display: inline-block;
            float: left;
            visibility: hidden;
            width: 33.33%;
            padding: 50px 0;
            background: #910;
            color: #fff;
            font-size: 1.5em;
            border-radius: 5px;
        }

        .success-box {
            width: 400px;
            padding: 50px;
            background: lightgreen;
            color: #fff;
            position: absolute;
            left: 200px;
            top: 100px;
            border-radius: 5px;
            visibility: hidden;
            z-index: 10;
        }

        .remain {
            display: block;
            width: 100%;
            clear:both;
            margin: 40px 0;
            padding: 20px;
            line-height: 1.5em;
        }

        .remain span {
            color: red;
            font-weight: bold;
        }

        .show {
            visibility: visible;
        }

        .unshow {
            visibility: hidden;
        }

        .error {
            color: red;
            font-size: 1.5em;
        }

    </style>
</head>
<body>
    <div id="wrapper">
		<h1>Welcome to the Great Number Game</h1>
        <h2>I am thinking of a number between 1 and 100<br/>Take a guess.</h2>
        <div class="error">
<?php
        if(isset($_SESSION["message"])
            && $_SESSION["message"] != "") {
            echo $_SESSION["message"];
        }
?>
        </div>
        <div class="side-box <?= low() ?>">too low!</div>
		<form method="post" action="great_number_game_control.php">
			<input type="text" name="guess_number" placeholder="Insert a number!!">
			<input class="submit" type="submit" name="submit">
	   </form>
       <div class="side-box <?= high() ?>">too high!</div>
       <div class="success-box <?= correct() ?>">
            <h1><?= $_SESSION["correct_number"] ?> was the number!</h1>
            <form class="reset-form" method="post" action="great_number_game.php">
                <input class="reset" type="submit" name="reset" value="Play Again">
            </form>
       </div>
       <br/>
       <div class="remain">
            Remaining Guess<br />
            <span><?= $_SESSION["remaining_guess"]?></span>
        </div>
    </div>
</body>
</html>