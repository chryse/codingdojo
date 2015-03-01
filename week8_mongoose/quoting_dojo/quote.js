module.exports = (function() {
	var mongoose = require("mongoose");	
	mongoose.connect("mongodb://localhost/quoting_dojo");	

	var QuotingSchema = new mongoose.Schema({
		name: String,
		quote: String,
		date: {type: Date, default: Date.now},
		like: Number
	});

	QuotingSchema.path("name").required(true, "User name cannot be blank");
	QuotingSchema.path("quote").required(true, "Quote cannot be blank");

	var Quote = mongoose.model("Quote", QuotingSchema);

	return {
		create: function(collection, callback) {
			var quote = new Quote(collection);
			return quote.save(function(err) {
				callback(err);
			});
		},

		read: function(callback) {
			return Quote.find({}, function(err, data) {
				callback(err, data);
			});
		},

		update: function(filter, callback) {
			return Quote.update(filter, {$inc: {like: 1}}, function(err, data) {
				callback(err, data);
			})
		},

		delete: function() {

		}
	}
})();