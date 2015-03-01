// ----- SETTING UP OUR EXPRESS APP ------
// require express
var express = require('express');
// create the express application
var app = express();
// makes your life easier with path stuff 
var path = require('path');

// allows you to use post data in the form of req.body
var bodyParser = require('body-parser');
// set up bodyParser 
app.use(bodyParser.urlencoded({extended: true}));

// tells the express app where are views are and tells the express app what kind of templating engine we are using
app.set('views', path.join(__dirname, './views'));
app.set('view engine', 'ejs');

require('./config/routes.js')(app);

// listen
app.listen(8001, function() {
	console.log("See all my friends on 8001!")
})
