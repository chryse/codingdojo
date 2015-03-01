var mongoose = require("mongoose");
var Customer = mongoose.model("Customer");

module.exports =(function() {
	return {
		create: function(req, res) {
			var newCustomer = new Customer(req.body);
			newCustomer.save(function(err, result) {
				if(!err) {
					res.json(result);
				}
			});
		},
		read: function(req, res) {
			Customer.find({}, function(err, result) {
				if(!err) {
					res.json(result);
				}
			})
		},
		delete: function(req, res) {
			// console.log(req.params.id);
			Customer.remove({_id: req.params.id}, function(err) {
				if(!err) {
					res.end();
				}
			});
		}
	}
})();