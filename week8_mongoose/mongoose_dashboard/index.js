var express = require("express");
var path = require("path");
var bodyParser = require("body-parser");
var app = express();
var mongoose = require("mongoose");
var User = require("./models/User.js");
var Message = require("./models/Message.js")
mongoose.connect("mongodb://localhost/dashboard");

// in order to keep tracking user logged
var login_user = {};
login_user.is_logged = false;


app.use(bodyParser.urlencoded({extended: false}));
app.use(express.static(__dirname, "./assets"));
app.set("views", path.join(__dirname, "./views"));
app.set("view engine", "ejs");


app.get("/", function(req, res) {
	res.render("index", {title: "Welcome to the Dashboard"});
})

app.get("/signup", function(req, res) {
	res.render("signup");
})

app.post("/signup", function(req, res) {
	console.log("POST DATA:", req.body);
	var collection = {
		email 		: req.body.email,
		first_name	: req.body.first_name,
		last_name	: req.body.last_name,
		password 	: req.body.password,
		date 		: {type: Date, default: Date.now}
	}

	var user = new User(collection);

	user.save(function(err) {
		if(err) {
			res.send("Fail to save data");
		}
		else {
			console.log("success to save");

			// save user info as a global variable
			login_user.is_logged = true;
			login_user.user = collection;
			res.redirect("/dashboard");
		}
	})
})

app.get("/signin", function(req, res) {
	res.render("signin");
})

app.post("/signin", function(req, res) {
	// console.log("POST DATA:", req.body);
	if(req.body.email == "") {
		res.redirect("/signin");
	}
	else if(req.body.email == "") {
		res.redirect("signin");
	}
	else {
		User.findOne({email: req.body.email}, function(err, user) {
			if(err) throw err;

			user.comparePassword(req.body.password, function(err, isMatch) {
				if(err) {
					throw err;
				}
				if(isMatch) {
					login_user.is_logged = true;
					login_user.user = user; 
					res.redirect("/dashboard");
				}
				else {
					res.redirect("/signin");
				}
			});
		});
	}
})

app.get("/signout", function(req, res) {
	login_user.is_logged = false;
	res.redirect("/");
})

app.get("/dashboard", function(req, res) {
	if(login_user.is_logged) {
		User.find({}, function(err, users){
			if(err) {
				res.send("Fail to retrieve data");
			}
			else {
				res.render("dashboard", {title: "Users List", users: users, login_user: login_user});
			}
		});	
	}
	else {
		// res.send("You need to log in!!");
		res.redirect("/signin");
	}
})

app.get("/users/:id", function(req, res) {
	if(login_user.is_logged) {
		User.findOne({_id: req.params.id}, function(err, user) {
			if(err) {
				res.send("Fail to retrieve user data");
			}
			else {
				// console.log(user);
				var title = user.first_name + " " + user.last_name + "'s Page";
				Message.find({user_id : req.params.id}, function(err, messages) {
					if(err) {
						res.send("Fail to retrieve message data");
					}
					else {
						res.render("user_page", {title: title, user: user, login_user: login_user, messages: messages});
					}
				});
			}
		});	
	}
	else {
		// res.send("You need to log in!!");
		res.redirect("/signin");
	}
})

app.post("/messages/add", function(req, res) {
	console.log("POST DATA:", req.body);
	var collection = {
		user_id 		: req.body.user_id,
		written_user_id	: req.body.user_written,
		message 		: req.body.message,
		date 			: {type: Date, default: Date.now}
	}

	var message = new Message(collection);

	message.save(function(err) {
		if(err) {
			res.send("Fail to save data");
		}
		else {
			console.log("success to save");
			Message.find({user_id : collection.user_id}, function(err, messages) {
				if(err) {
					res.send("Fail to retrieve data");
				}
				else {
					res.render("message_list", {messages: messages});		
				}
			});
		}
	});
	
})

app.listen(7777, function() {
	console.log("\n\n\nlistening on port 7777");
})