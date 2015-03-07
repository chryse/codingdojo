var mongoose = require("mongoose");
var Dashboard = mongoose.model("Post");
var User = mongoose.model("User");

module.exports =(function() {
	return {
		create: function(req, res) {
			// var newCustomer = new Customer(req.body);
			// newCustomer.save(function(err, result) {
			// 	if(!err) {
			// 		res.json(result);
			// 	}
			// });
		},
		read: function(req, res) {
			// Customer.find({}, function(err, result) {
			// 	if(!err) {
			// 		res.json(result);
			// 	}
			// })
		}
	}
})();