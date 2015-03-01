var express = require("express");
var path = require("path");
var bodyParser = require("body-parser");
var mongoose = require("mongoose");
var app = express();
mongoose.connect("mongodb://localhost/basic_mongoose_app");

app.use(bodyParser.urlencoded({extended: false}));
app.use(express.static(path.join(__dirname, "./static")));
app.set("views", path.join(__dirname, "./views"));
app.set("view engine", "ejs");

var UserSchema = new mongoose.Schema({
	name: String,
	age: Number,
	nickname: String,
	date: {type: Date, default: Date.now} 
});

UserSchema.path("name").required(true, "User name cannot be blank");
UserSchema.path("age").required(true, "Age cannot be blank");
// UserSchema.path("nickname").required(true, "Nickname cannot be blank");

var User = mongoose.model("User", UserSchema);


app.get("/", function(req, res) {
	User.find({}, function(err, users) {
		// console.log(users);
		res.render("index", {users: users});
	})
	
});

app.get("/users", function(req, res) {
	User.find({}, function(err, users) {
		console.log(users);
		res.render("index", {users: users});
	})
});

app.post("/users", function(req, res) {
	console.log("POST DATA", req.body);
	var user = new User({name: req.body.name, age: req.body.age});
	user.save(function(err) {
		if(err) {
			console.log("Something went wrong");
			// res.render("index", {title: "You have errors!", errors: user.err})
		}
		else {
			console.log("successfully added a user!");
			res.redirect("/users");
		}
	});
});

app.get("/users/:id", function(req, res) {
	User.findOne({_id: req.params.id}, function(err, user) {
		console.log(user);
		res.render("user", {user: user});
	});
});

app.post("/users/:id", function(req, res) {
	// console.log(req.body.nickname, "user_id", req.params.id);
	User.update({_id: req.params.id}, {nickname: req.body.nickname}, {upsert: true}, function(err, user) {
		if(err) {
			console.log("error to insert");
		}
		else {
			console.log("success");
			console.log(user);
			res.redirect("/users");	
		}
	});
});

app.get("/remove/:id", function(req, res) {
	console.log(req.params.id);
	User.remove({_id: req.params.id}, function(err) {
		if(err) {
			console.log("errer to remove");
		}
		else {
			console.log("successfully removed");
			res.redirect("/users");	
		}
	});
});

app.listen(8000, function() {
	console.log("listening on port 8000");
});