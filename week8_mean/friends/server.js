var express = require("express");
var path = require("path");
var bodyParser = require("body-parser");
var app = express();

app.use(express.static(path.join(__dirname, "./client")));
app.use(bodyParser.urlencoded({extended: false}));
// very important to keep it. 
app.use(bodyParser.json());


require("./config/mongoose.js");
// mongoose should be before the routes.js
require("./config/routes.js")(app);



app.listen(8004, function() {
	console.log("listening on port 8004");
})