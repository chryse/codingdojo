// require mongoose which is the layer between our database and express
var mongoose = require('mongoose');

// connect to the database server
mongoose.connect('mongodb://localhost/friends_demo');

// set up my friendSchema
var friendSchema = new mongoose.Schema({
	name: String
})

// creating the mongoose model and calling it "Friend"
module.exports = mongoose.model('Friend', friendSchema);