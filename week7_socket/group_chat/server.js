var express = require("express");
var path = require("path");
var bodyParser = require("body-parser");
var app = express();
var chat_content = [];

app.use(express.static(path.join(__dirname, "./static")));
app.use(bodyParser.urlencoded({extended: true}));
app.set("views", path.join(__dirname, "./views"));
app.set("view engine", "ejs");

app.get("/", function(req, res) {
	res.render("index", res.req.headers);
});

var server = app.listen(8000, function(){
	console.log("\n\n\nListening on port 8000");
})

var socket_connection = require("socket.io").listen(server);

socket_connection.sockets.on("connection", function(socket) {

	console.log(chat_content);
	var user_id = socket.id;

	socket.on("disconnect", function() {
		console.log("\n\n\nGot disconnect!!");
		console.log(socket.id);
		for(var i = 0; i < chat_content.length; i++) {
			if(socket.id == chat_content[i].id) {
				var left_info = {};
				left_info.id = chat_content[i].id;
				left_info.name = chat_content[i].name;
				left_info.message = "has left.";
				chat_content.push(left_info);
				console.log(left_info);
				socket_connection.emit("client_left", left_info);
				break;
			}
		}
	});

	socket.on("server_add_user", function(data) {
		var first_info = {};
		first_info.id = user_id;
		first_info.name = data.name;
		first_info.message = "has joined the chat room.";
		chat_content.push(first_info);
		socket_connection.emit("client_add_user", chat_content);
		console.log(chat_content);
	});

	socket.on("server_add_message", function(data) {
		chat_content.push(data);
		socket_connection.emit("client_add_message", data);
		console.log(chat_content);
	})
});