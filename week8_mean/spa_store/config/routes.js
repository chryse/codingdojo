var customers = require("./../server/controllers/customers.js");
var orders = require("./../server/controllers/orders.js");
var products = require("./../server/controllers/products.js");

module.exports = function(app) {

	// customers
	app.post("/customers", function(req, res) {
		customers.create(req, res);
	});

	app.get("/customers", function(req, res) {
		customers.read(req, res);
	});

	app.delete("/customers/:id", function(req, res) {
		customers.delete(req, res);
	});

	// orders
	app.post("/orders", function(req, res) {
		orders.create(req, res);
	});

	app.get("/orders", function(req, res) {
		orders.read(req, res);
	});

	// products
	app.post("/products", function(req, res) {
		products.create(req, res);
	});

	app.get("/products", function(req, res) {
		products.read(req, res);
	});

	app.delete("/products/:id", function(req, res) {
		products.delete(req, res);
	})
}