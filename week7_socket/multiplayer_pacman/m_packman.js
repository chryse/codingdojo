var express = require("express");
var path = require("path");
var bodyParser = require("body-parser");
var app = express();
var chat_contents = [];

app.use(express.static(path.join(__dirname, "./assets")));
app.use(bodyParser.urlencoded({extended: true}));
app.set("views", path.join(__dirname, "./views"));
app.set("view engine", "ejs");

app.get("/", function(req, res) {
	res.render("index");
});

app.post("/", function(req, res) {
	if(req.body.name == "") {
		res.redirect("/");
	}
	else {
		res.render("game", {user_name: req.body.name});	
	}
});

var server = app.listen(7070, function(){
	console.log("\n\n\nListening on port 7070");
});

var io = require("socket.io").listen(server);

io.sockets.on("connection", function(socket) {
	var user_id = socket.id;

	socket.on("server_add_user", function(data) {
		var user_info = {};
		user_info.user_id = user_id;
		user_info.user_name = data.user_name;
		user_info.user_message = "has joined the game.";

		// monitor purpose, save all information
		chat_contents.push(user_info);
		io.emit("client_add_user", user_info);
		console.log(chat_contents);
	});

	socket.on("server_add_message", function(data) {
		chat_contents.push(data);
		io.emit("client_add_message", data);
		console.log(chat_contents);
	});

});
