var express = require("express");
var app = express();
var bodyParser = require("body-parser");

app.set("views", __dirname + "/views");
app.set("view engine", "ejs");
app.use(express.static(__dirname + "/static"));
app.use(bodyParser.urlencoded({extended: true}));

app.get("/", function(req, res) {
	res.render("index");
	console.log("index page loaded");
});

app.post("/result", function(req, res) {
	console.log("Post data:", req.body);
	res.render("results", req.body);
});


app.listen(8000, function() {
	console.log("Listening on 8000");
});