<?php
    session_start();

    if (isset($_POST["reset"])) {
        $_SESSION = array();
        $_SESSION["counter"] = 1;
    }
    else {
        $_SESSION["counter"]++;
    }
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Counter</title>
    <meta charset="utf-8">
    <style>
    	h1 {
    		text-align: center;
    	}
        #wrapper {
            width: 500px;
            margin: 0 auto;
        }

        #wrapper div {
            display: inline-block;
            width: 100%;
            
            padding: 40px 0;
            font-size: 3.0em;
            color: #111;
            font-family: sans-serif;
            text-align: center;
            border: 1px solid #aaa;
        }

        form {
            width: 100%;
            text-align: center;
        }

        .btn {
            width: 100px;
            height: 30px;
            background: #a00;
            font-size: 1.2em;
            border-radius: 5px;
            border: 0px;
            color: #fff;
            outline: none;
            cursor: pointer;
        }

        a {
            color: #fff;
            text-decoration: none;
        }

    </style>
</head>
<body>
    <div id="wrapper">
	   <h1>You visited the site</h1>
       <div><?= $_SESSION["counter"] ?></div>
       <h1>times</h1>
	   <form method="post" action="counter.php">
            <input type="submit" name="reset" value="reset" class="btn">
	   </form>
    </div>
</body>
</html>