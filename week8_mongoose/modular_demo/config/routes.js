var friendController = require('../controllers/friends.js');

module.exports = function(app) {
	app.get('/', function(req, res) {
		friendController.show(req, res);
	})
	app.post('/friends', function(req, res) {
		friendController.add(req, res);
	})
}
// routes call upon controller
