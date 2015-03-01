var mongoose = require("mongoose");
var Schema = mongoose.Schema;
var orderSchema = mongoose.Schema({
	_customer	: { type: Schema.ObjectId, ref: "Customer" },
	product 	: String,
	quantity	: Number,
	created_at 	: { type: Date, default: Date.now }
})
// var schema = new mongoose.Schema({
// 	product		: String,
// 	quantity	: Number,
// 	created_at 	: { type: Date, default: Date.now }
// });

mongoose.model("Order", orderSchema);