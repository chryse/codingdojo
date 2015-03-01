var mongoose = require("mongoose");
var Friend = mongoose.model("Friend");

module.exports = (function() {
	return {
		create: function(req, res) {
			var new_friend = new Friend(req.body);
			new_friend.save(function(err) {
				if(err) {
					console.log(err);
				}
				else {
					Friend.find({}, function(err, friends) {
						if(err) {
							console.log(err);
						}
						else {
							console.log("create and find all return to view: ", friends)
							res.json(friends);
						}
					});
					// res.json("success");
				}
			})
		},
		read: function(req, res) {
			Friend.find({}, function(err, friends) {
				if(err) {
					console.log(err);
				}
				else {
					res.json(friends);
				}
			});
		},
		update: function(req, res) {
			console.log("friends ctrl", req.params.id);
		},
		delete: function(req, res) {
			console.log("delete:", req.params.id);
			Friend.remove({_id: req.params.id}, function(err, friends) {
				if(err) {
					console.log(err);
					res.send(err);
				}
				else {
					Friend.find({}, function(err, friends) {
						if(err) {
							console.log(err);
						}
						else {
							console.log("create and find all return to view: ", friends)
							res.json(friends);
						}
					});
				}
			});
		}
	};
})();