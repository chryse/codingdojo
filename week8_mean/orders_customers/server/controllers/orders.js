var mongoose = require("mongoose");
var Order = mongoose.model("Order");
var Customer = mongoose.model("Customer");
// var ObjectId = mongoose.Schema.Types.ObjectId;

module.exports = (function() {
	return {
		create: function(req, res) {
			
			console.log(req.body.customer_id);
			
			Customer.find({_id : req.body.customer_id}, function(err, selectedCustomer) {

				console.log("result", selectedCustomer[0]);

				// console.log("result id", result);
				// console.log("requset body", req.body);
				var newOrder = new Order({
								product 	: req.body.product,
								quantity	: req.body.quantity,
								_customer	: selectedCustomer[0]._id
							});
				
				console.log("with customer_id", newOrder);
				selectedCustomer[0].orders.push(newOrder);
				newOrder.save(function(err) {
					selectedCustomer[0].save(function(err) {
						if(!err) res.end();
					});
				});
			});
		},
		read: function(req, res) {
			var resultData = {};
			Order.find({})
					.populate("_customer")
					.exec(function(err, result) {
						if(!err){
							console.log(result);
							res.json(result);
						}
					})
		},
		update: function(req, res) {

		},
		delete: function(req, res) {
			
		}
	};
})();