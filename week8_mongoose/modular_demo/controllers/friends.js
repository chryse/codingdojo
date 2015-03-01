// create a friendController object which is basically our controller in an MVC type environment
var Friend = require('../Models/Friend.js');

var friendController = {}

friendController.show = function(req, res) {
	Friend.find({}, function(err, results) {
		if(err) {
			res.send('Something is wrong!');
		} else {
			res.render('index', {friends: results});
		}
	})
}

friendController.add = function(req, res) {
	var new_friend = new Friend({name: req.body.name});
	new_friend.save(function(err) {
		if(err) {
			res.send('Something is wrong!');
		} else {
			res.redirect('/');
		}
	})
}

module.exports = friendController;
