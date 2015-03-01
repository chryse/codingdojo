var mongoose = require("mongoose");
var Product = mongoose.model("Product");

module.exports = (function() {
	return {
		create: function(req, res) {
			console.log(req.body);
			var newProduct = new Product(req.body);
			newProduct.save(function(err, result) {
				if(!err) {
					res.json(result);
				}
			});
		},
		read: function(req, res) {
			console.log("controller / read");
			Product.find({}, function(err, result) {
				if(!err) {
					res.json(result);
				}
			});
		},
		delete: function(req, res) {
			Product.remove({_id: req.params.id}, function(err) {
				if(!err) {
					res.end();
				}
			});
		}
	}
})();