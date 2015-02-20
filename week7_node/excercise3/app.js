var http = require("http");
var fs = require("fs");
var server = http.createServer(function(request, response) {
	console.log("clinet request url:", request.url);

	if(request.url === "/") {
		console.log(request.url);
		fs.readFile("index.html", "utf-8", function(errors, contents) {
			response.writeHead(200, {"Content-type" : "text/html"});
			response.write(contents);
			response.end();
		});
	}
	else if(request.url === "/home") {
		fs.readFile("home.html", "utf-8", function(errors, contents) {
			response.writeHead(200, {"Content-type" : "text/html"});
			response.write(contents);
			response.end();
		});
	}
	else {
		response.writeHead(404);
		response.end("File not found");
	}
});
server.listen(6789);

console.log("Server running in localhost at port 6789");
