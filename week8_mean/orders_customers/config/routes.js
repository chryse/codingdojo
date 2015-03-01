var customers = require("./../server/controllers/customers.js");
var orders = require("./../server/controllers/orders.js");
module.exports = function(app) {

	app.get("/customers", function(req, res) {
		customers.read(req, res);
	});

	app.post("/customers", function(req, res) {
		customers.create(req, res);
	});

	app.delete("/customers/:id", function(req, res) {
		customers.delete(req, res);
	})

	app.get("/orders", function(req, res) {
		orders.read(req, res);
	});

	app.post("/orders", function(req, res) {
		orders.create(req, res);
	})

}