var mongoose = require("mongoose");
var Schema = mongoose.Schema;

// appointment
var schema = mongoose.Schema({
	date 			: { type: Date },
	time 			: String,
	patientName 	: String,
	complain		: String,
	created_at 		: { type: Date, default: Date.now }
});

mongoose.model("Appointment", schema);