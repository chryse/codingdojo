var express = require("express");

var app = express();

app.use(express.static(__dirname + "/static"));

app.set("views", __dirname + "/views");
app.set("view engine", "ejs");

app.get("/users", function(request, response){
	//hard-coded user data
	var users_array = [
		{name: "Michael", email: "example1@example.com"},
		{name: "Jay", email: "example2@example.com"},
		{name: "Rory", email: "example3@example.com"},
		{name: "Andrew", email: "example4@example.com"}
	];
	response.render("users", {users: users_array});
});

app.listen(8000, function() {
	console.log(__dirname);
});