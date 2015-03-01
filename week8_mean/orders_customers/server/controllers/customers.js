var mongoose = require("mongoose");
var Customer = mongoose.model("Customer");
var Order = mongoose.model("Order");
module.exports = (function() {
	return {
		create: function(req, res) {
			var newCustomer = new Customer(req.body);
			newCustomer.save(function(err){
				if(!err) {
					Customer.find({}, function(err, result) {
						if(!err) {
							res.json(result);
						}
					});
				}
			})
		},
		read: function(req, res) {
			console.log("customers ctrl read");
			Customer.find({}, function(err, result) {
				if(err) {
					console.log(err);
				}
				else {
					res.json(result);
				}
			});
		},
		update: function(req, res) {

		},
		delete: function(req, res) {
			console.log("will be removed id:", req.params.id);
			Customer.remove({_id: req.params.id}, function(err) {
				if(!err) {
					Customer.find({}, function(err, result) {
						if(!err) {
							res.json(result);
						}
					});
				}
			});
		}
	};
})();