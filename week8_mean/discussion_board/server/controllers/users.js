var mongoose = require("mongoose");
var User = mongoose.model("User");

module.exports =(function() {
	return {

		create: function(req, res) {
			console.log("server user ctrl create");
			console.log(req.body);
			var newUser = new User({name: req.body.name, status: true});
			// newUser.status = true;
			newUser.save(function(err, result) {
				if(err) {
					res.json(err.errors);
				}
				else {
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
		}
	}
})();