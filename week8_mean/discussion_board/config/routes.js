var login = require("./../server/controllers/login.js");
var dashboard = require("./../server/controllers/dashboard.js");
var topic = require("./../server/controllers/topic.js");
var user = require("./../server/controllers/users.js");


module.exports = function(app) {

	// app.get("/", function(req, res) {
	// 	console.log(req.body);
	// 	login.read(req, res);
	// });

	app.post("/signin", function(req, res) {
		user.create(req, res);
	});

	app.get("/dashboard", function(req, res) {
		res.send("ok");
		// dashboard.read(req, res);
	});

	app.get("/dashboard", function(req, res) {
		redirect("/");
	});

	app.post("/dashboard", function(req, res) {
		dashboard.create(req, res);
	});

	app.get("topic/:id", function(req, res) {
		topic.read(req, res);
	});

	app.post("topic/:id", function(req, res) {
		topic.create(req, res);
	})

	app.post("comment", function(req, res) {

	});

	app.get("user/:id", function(req, res) {
		user.read(req, res);
	})
}