var express = require("express");

var app = express();

app.get("/", function(request, response) {
	response.send("<h1>Hello Express</h1>");
});

app.listen(8000, function() {
	console.log("Listening on 8000");
});