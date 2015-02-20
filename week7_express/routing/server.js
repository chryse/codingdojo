var express = require("express");
var app = express();
var bodyParser = require("body-parser");
var users_array = [
		{name: "Michael", email: "example1@example.com"},
		{name: "Jay", email: "example2@example.com"},
		{name: "Rory", email: "example3@example.com"},
		{name: "Andrew", email: "example4@example.com"}
	];

app.set("views", __dirname + "/views");
app.set("view engine", "ejs");
app.use(bodyParser.urlencoded({extended: true}));

app.get("/", function(req, res){
	res.render("index");
	console.log("This is index");
});

app.get("/users", function(request, response){
	//hard-coded user data
	
	response.render("users", {users: users_array});
});


app.get("/users/new", function(req, res){
	res.render("new");
});

app.get("/users/:id", function(req, res) {
	console.log("The user id requested is:", req.params.id);
	res.send("You requested the user with id: " + req.params.id);
});

app.post("/users/add", function(req, res){
	console.log("POST DATA", req.body);
	// code to add user to db goes here!
	// redirect the user backto to the root route
	// All we do is specify the URL we want to go to
	users_array.push(req.body);
	res.render("success");
});


app.listen(8000, function() {
	console.log("Listening on 8000");
});