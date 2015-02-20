var http = require("http");
var static_contents = require("./static.js");
var server = http.createServer(function(request, response) {
	static_contents(request, response);
});
server.listen(8000);
console.log("Running on port 8000");