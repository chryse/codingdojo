var express = require("express");
var path = require("path");
var bodyParser = require("body-parser");
var app = express();
var total_number = 0;

app.set("views", path.join(__dirname, "./views"));
app.set("view engine", "ejs");
app.use(bodyParser.urlencoded({extended : true}));
app.use(express.static(path.join(__dirname, "./static")));

app.get("/", function(req, res) {
	res.render("index", {total_number : total_number});
});

var server = app.listen(6789, function() {
	console.log("\n\n\nListening on port 6789");
});

var io = require("socket.io").listen(server);

io.sockets.on("connection", function(socket) {
	console.log(socket.id)

	//announce current number
	io.emit("announce_current_number", {s_res: total_number});

	socket.on("current_number", function(data) {
		total_number = data.total_number;
	})

	socket.on("increase_number", function(data) {
		console.log(data);
		total_number = data.total_number;
		io.emit("server_response", {s_res: total_number});
	});

	socket.on("reset_number", function(data) {
		total_number = data.total_number;
		io.emit("server_response", {s_res: total_number});
	})
});