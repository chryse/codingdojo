var appointments = require("./../server/controllers/appointments.js");

module.exports = function(app) {

	app.post("/appointments", function(req, res) {
		appointments.create(req, res);
	});

	app.get("/appointments", function(req, res) {
		appointments.read(req, res);
	});

	app.delete("/appointments/:id", function(req, res) {
		appointments.delete(req, res);
	});
}