<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Weather API</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>

    <script>
    	$(document).ready(function() {
    		$("button#go").click(function() {
    			$.ajax({
    				url: "/weather/ajax",
    				type: "POST",
    				data: { city : $("select#city").val() }
    			})

    			.done(function(data) {

    				// make data string into json object 
    				var obj = $.parseJSON(data);
    				$("div#result").html(makeResult(obj));
					console.log(obj);
    			})

    			// need return false, so don't go through
    			return false;
    		});
    	});

    	var makeResult = function(data) {
    		result =  "<h2>Weather for " + data.name + "</h2>"
    				+ "<p>"
    				+ "Current Temp K: " + data.main.temp + "<br />"
    				+ "Current Temp F: " + ktoF(data.main.temp) + "<br />"
    				+ "Current Temp C: " + ktoC(data.main.temp) + "<br />"
    				+ "Current Windspeed: " + data.wind.speed + "MPH<br />"
    				+ "Weather Description: " + data.weather[0].description
    				+ "</p>";
    		return result;
    	}

    	var ktoC = function(k) {
    		return (k - 273.15).toFixed(2);
    	}

    	var ktoF = function(k) {
    		// return k;
    		return (ktoC(k) * 9/5 + 32).toFixed(2);
    	}
	</script>

    <style>
    	div#result {
    		width: 500px;
    		overflow: scroll;
    		margin-top: 20px;
    		padding: 10px;
    	}

    	h2 {
    		text-decoration: underline;
    	}

    	p {
    		font-size: 1.2em;
    		line-height: 1.5em;
    	}
    </style>
</head>
<body>

	<div class="container">
		<h1>The Codingdojo weather report!</h1>
		<form>
			<select id="city">
				<option value="none">Select City</option>
				<option value="San Francisco">San Francisco</option>
				<option value="San Jose">San Jose</option>
				<option value="Sydney">Sydney</option>
				<option value="New York">New York</option>
				<option value="Boston">Boston</option>
				<option value="Houston">Houston</option>
			</select>
			<button id="go" class="btn btn-success" type="submit">Get Weather</button>
		</form>
		<div id="result"></div>
	</div>

</body>
</html>