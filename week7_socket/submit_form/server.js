var express = require("express");
var path = require("path");
var bodyParser = require("body-parser");
var app = express();

app.set("views", path.join(__dirname, "./views"));
app.set("view engine", "ejs");
app.use(bodyParser.urlencoded({extended: true}));
app.use(express.static(path.join(__dirname, "./static")));

app.get("/", function(req, res) {
	res.render("index");
});

app.post("/", function(req, res) {
	res.render("index");
})

var server = app.listen(8000, function() {
	console.log("Listening on port 8000");
});

var socket_io = require("socket.io").listen(server);

socket_io.sockets.on("connection", function(socket) {
	console.log(socket.id);

	socket.on("posting_form", function(data) {
		console.log(data);

		var post_content = "You emitted following information to the server: { " 
							+ data[0].name + ": '<strong>"
							+ data[0].value + "</strong>', "
							+ data[1].name + ": '<strong>"
							+ data[1].value + "</strong>' "
							+ data[2].name + ": '<strong>"
							+ data[2].value + "</strong>' "
							+ data[3].name + ": '<strong>"
							+ data[3].value + "</strong>'}";
		var rand_num = "Your lucky numbers emitted by the server is <strong>"
						+ Math.round(Math.random() * 1000)
						+ "</strong>.";

		var post_data = { content: post_content };
		var randnum_data = { content: rand_num };
		socket.emit("updated_message", post_data);
		socket.emit("random_number", randnum_data);
	});	
});
