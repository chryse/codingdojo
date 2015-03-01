var mongoose = require("mongoose");

var schema = new mongoose.Schema({
	name: String,
	age: Number
});

mongoose.model("Friend", schema);