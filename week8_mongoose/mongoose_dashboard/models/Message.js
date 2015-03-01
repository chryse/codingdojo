var mongoose = require("mongoose")

var MessageSchema = new mongoose.Schema({
	user_id 		: { type: String },
	written_user_id : { type: String },
	created_at 		: { type: Date, default: Date.now},
	message 		: { type: String, required: true }
});

module.exports = mongoose.model("Message", MessageSchema);