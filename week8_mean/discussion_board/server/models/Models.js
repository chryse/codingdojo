var mongoose = require("mongoose");
var Schema = mongoose.Schema;

// user schema
var userSchema = mongoose.Schema({
	name 		: { type: String },
	status 		: Boolean,
	created_at 	: { type: Date, default: Date.now },
	topics		: [{ type: Schema.ObjectId, ref: "Topic"}]
	posts 		: [{ type: Schema.ObjectId, ref: "Post"}]
});

userSchema.path("name").required(true, "User name cannot be blank");

// topic schema
var topicSchema = mongoose.Schema({
	_user 			: { type: Schema.Types.ObjectId, ref: "User" },
	category		: String,
	title			: String,
	description		: String,
	created_at 		: { type: Date, default: Date.now },
	posts 			: [{ type: Schema.ObjectId, ref: "Post"}]
})

// post schema
var postSchema = mongoose.Schema({
	_topic			: { type: Schema.Types.ObjectId, ref: "Topic" },
	_user 			: { type: Schema.Types.ObjectId, ref: "User"},
	post			: String,
	like 			: Number,
	dislike 		: Number,
	created_at 		: { type: Date, default: Date.now }
})

mongoose.model("User", userSchema);
mongoose.model("Topic", topicSchema);
mongoose.model("Post", postSchema);