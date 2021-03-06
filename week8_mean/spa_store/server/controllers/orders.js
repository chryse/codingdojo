var mongoose = require("mongoose");

var Customer = mongoose.model("Customer");
var Product = mongoose.model("Product");
var Order = mongoose.model("Order");

module.exports = (function() {
	return {
		create: function(req, res) {
			console.log(req.body);
			var newOrder = new Order({
				_customer	: req.body.customer_id,
				_product 	: req.body.product_id,
				quantity	: req.body.quantity
			});
			
			newOrder.save(function(err, result) {
				if(!err) {
					Order.findOne(newOrder)
						 .populate("_customer")
						 .populate("_product")
						 .exec(function(err, result1) {
						 	console.log(result1)
						 	res.json(result1);
						 })
				}
			})
		},
		read: function(req, res) {
			console.log("server order Ctrl read method");

			Order.find()
				 .populate("_customer")
				 .populate("_product")
				 .exec(function(err, result) {
				 	res.json(result);
				 });
		}
	}
})();