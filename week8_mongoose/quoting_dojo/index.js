var express = require("express");
var path = require("path");
var bodyParser = require("body-parser");
var app = express();

// database setting
// var mongoose = require("mongoose");
// mongoose.connect("mongodb://localhost/quoting_dojo");
// var QuotingSchema = new mongoose.Schema({
// 	name: String,
// 	quote: String,
// 	date: {type: Date, default: Date.now},
// 	like: Number
// });


// QuotingSchema.path("name").required(true, "User name cannot be blank");
// QuotingSchema.path("quote").required(true, "Quote cannot be blank");

// var Quote = mongoose.model("Quote", QuotingSchema);

///////////////////////////////////////////////


// my own module for quote
var quote = require("./quote.js");



app.use(bodyParser.urlencoded({extended: false}));
app.set("views", path.join(__dirname, "./views"));
app.set("view engine", "ejs");

app.get("/", function(req, res) {
	res.render("index");
});

app.post("/main", function(req, res) {
	console.log("POST DATA", req.body);
	// var quote = new Quote({name: req.body.name, quote: req.body.quote, date: {type: Date, default: Date.now}, like: 0});

	// quote.save(function(err) {
	// 	if(err) {
	// 		res.render("index", {title: "you have errors.", errors: quote.errors});
	// 		console.log(quote.errors);
	// 	}
	// 	else {
	// 		console.log("successfully add a quote");
	// 		res.redirect("/main");
	// 	}
	// });
	var collection = {name: req.body.name, quote: req.body.quote, date: {type: Date, default: Date.now}, like: 0};
	quote.create(collection, function(err) {
		if(err) {
			res.render("index", {title: "you have errors.", errors: err.errors});
		}
		else {
			res.redirect("/main");
		}
	})
});

app.get("/main", function(req, res) {
	// Quote.find({}, function(err, quotes) {
	// 	if(!err) {
	// 		res.render("main", {quotes: quotes});
	// 	}
	// })
	quote.read(function(err, quotes) {
		if(!err) {
			res.render("main", {quotes: quotes});
		}
		else {
			console.log("error");
		}
	});
});

app.get("/like/:id", function(req, res) {
	console.log(req.params.id);
	// Quote.update({_id: req.params.id}, {$inc: {like: 1}}, function(err, quote) {
	// 	if(err) {
	// 		console.log("error to insert");
	// 	}
	// 	else {
	// 		console.log("success to like");
	// 		console.log(quote);
	// 		// res.send(quote.like);
	// 		res.redirect("/main");
	// 	}
	// });

	var filter = {_id: req.params.id};
	quote.update(filter, function(err, quote) {
		if(err) {
			console.log("error to insert");
		}
		else {
			console.log("success to like");
			res.redirect("/main");
		}
	});
})


app.listen(8100, function() {
	console.log("\n\n\nlistening on port 8100");
});