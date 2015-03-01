var friends = require("./../server/controllers/friends.js");
module.exports = function(app) {
	app.get("/friends", function(req, res) {		
		friends.read(req, res);
	}); 
	app.post("/friends", function(req, res) {
		console.log("routes:", req.body);
		friends.create(req, res);
	});
	app.put("/friends:id", function(req, res) {
		console.log("routes put request", req.params.id);
		friends.update(req, res);
	});
	app.delete("/friends:id", function(req, res) {
		console.log("routes delete request", req.params.id);
		friends.delete(req, res);
	});
}