<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Google Map API</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>

    <script>
    	$(document).ready(function() {
    		$("form").on("submit", function() {
    			$.ajax({
    				url: "/googlemap/ajax",
    				type: "GET",
    				data: {
    						from: $("input#from").val(),
    						to 	: $("input#to").val()
    					   }
    			}).done(function(data) {
    				
    				var obj = $.parseJSON(data);
					console.log(obj);
					// console.log(obj.routes[0].legs[0].steps[0]);
					var result = "<h2>Direction from ";
						result += obj.routes[0].legs[0].start_address;
						result += ", to ";
						result += obj.routes[0].legs[0].end_address;
						result += "</h2>";
						result += "<ol>";
						
						foreach(obj.routes[0].legs[0].steps, function(item) {
							result += "<li>" + item.html_instructions + "</li>";
						})
						
						result += "</ol>";
					
					$("div#result").html(result);
    			});

    			return false;
    		})
    	})

    	var foreach = function(obj, callback) {
    		for(var key in obj) {
    			callback(obj[key]);
    		}
    	}
	</script>

    <style>
    	form, ol {
    		margin-top: 40px;
    	}
    	li {
    		margin: 5px 0;
    	}
    </style>
</head>
<body>

	<div class="container">
		<h1>Google Map API</h1>
		<form class="form-inline">
			<div class="form-group col-md-3">
				<label class="label-control">From:</label>
				<input name="from" id="from" value="oakland" class="form-control">
			</div>
			<div class="form-group col-md-3">
				<label class="label-control">To:</label>
				<input name="to" id="to" value="sunnyvale" class="form-control">
			</div>
			<div class="form-group">
				<input class="btn btn-primary" type="submit" value="Get Direction">
			</div>
		</form>
		<div id="result"></div>
	</div>

</body>
</html>
