var mongoose = require("mongoose");
var Order = require("./Order.js");
var Schema = mongoose.Schema;
var customerSchema = mongoose.Schema({
	name 		: String,
	created_at 	: { type: Date, default: Date.now },
	orders 		: [{ type: Schema.Types.ObjectId, ref: "Order" }]
});

// var mongoose = require('mongoose');
// // to do associations, we must require the associated model/s in each file
// var Order = require('./Order.js');
// var Schema = mongoose.Schema;
// var postSchema = mongoose.Schema({
//  text: String, 
//  created_at: {type: Date, default: new Date},
//  comments: [{type: Schema.Types.ObjectId, ref: 'Comment'}]
// });
//  notice the comments propety is an array populated with objects.  The 'type' property of the object //  inside of the array is an attribute that tells Mongoose what to look for. 

mongoose.model("Customer", customerSchema);