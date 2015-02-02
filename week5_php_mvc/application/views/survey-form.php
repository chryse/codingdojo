<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
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

        form {
            width: 100%;
            margin: 0;
            padding: 0;
        }

        input, select {
        	display: inline-block;
        	width: 60%;
        	padding: 10px;
        	margin: 10px 0;
        	font-size: 1.1em;
        	float: left;

        }

        label {
        	display: inline-block;
        	width: 40%;
        	text-align: left;
        	float: left;
        }

        option {
        	padding: 10px;
        }

        label.textarea, textarea {
        	display: block;
        	float: left;
        	width: 100%;
        	font-size: 1.1em;
        	padding: 10px;
        }

        input.submit {
        	float: right;
        	margin: 10px auto;
        	border-radius: 10px;
        	border: 1px solid #000;
        	background: #0be;
        	color: #fff;
        	width: 100px;
        	outline: none;
        }

        button {
            float: left;
            padding: 10px;
            margin: 10px 0;
            font-size: 1.1em;
            margin: 10px auto;
            border-radius: 10px;
            border: 1px solid #000;
            background: #aa0;
            color: #fff;
            outline: none;
        }

    </style>
</head>
<body>
    <div id="wrapper">
		<h1>Survery Form</h1>
		<form method="post" action="survey-process">
			<label>Your Name:</label>
			<input name="name">
			<label>Dojo Location</label>
			<select name="location">
				<option>Mountain View</option>
				<option>San Jose</option>
				<option>Seattle</option>
			</select>
			<label>Favorite Language</label>
			<select name="language">
				<option>Javascript</option>
				<option>Ruby</option>
				<option>Python</option>
				<option>PHP</option>
				<option>C++</option>
				<option>Java</option>
			</select>
			<label class="textarea">Comment (Optional):</label>
			<textarea rows="10" cols="5" type="textarea" name="comment"></textarea>
			<input type="hidden" name="count" value="">
			<input class="submit" type="submit" name="">
        </form>
        <div class="goback">
            <a href="/"><button class="btn-primary">Go Back</button></a>
        </div>
    </div>
</body>
</html>