var mongoose = require("mongoose");
var Schema = mongoose.Schema;

// customer schema
var customerSchema = mongoose.Schema({
	name 		: String,
	created_at 	: { type: Date, default: Date.now }
});

// order schema
var orderSchema = mongoose.Schema({
	_customer		: { type: Schema.ObjectId, ref: "Customer" },
	_product		: { type: Schema.ObjectId, ref: "Product"},
	quantity		: Number,
	created_at 		: { type: Date, default: Date.now }
})

var productSchema = mongoose.Schema({
	// _order		: { type: Schema.Types.ObjectId, ref: "Order" },
	productName	: String,
	imageUrl	: String,
	description	: String,
	inventory	: Number,
	created_at 	: { type: Date, default: Date.now }
})

mongoose.model("Customer", customerSchema);
mongoose.model("Order", orderSchema);
mongoose.model("Product", productSchema);