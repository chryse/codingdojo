var http = require("http");
var fs = require("fs");
var server = http.createServer(function(request, response){
	console.log("client url:", request.url);
	console.log("\n\n\nreqeust");
	console.log(request);
	console.log("\n\n\nresponse");
	console.log(response);
	if(request.url === "/"){
		fs.readFile("index.html", "utf-8", function(errors, contents) {
			response.writeHead(200, {"Content-Type" : "text/html"});
			response.write(contents);
			response.end();
		});
	}
	else if(request.url === "/ninjas"){
		fs.readFile("./ninjas/ninjas.html", "utf-8", function(errors, contents) {			
			response.writeHead(200, {"Content-Type" : "text/html"});
			response.write(contents);
			response.end();
		});
	}
	else if(request.url === "/dojos/new"){
		fs.readFile("./ninjas/dojos.html", "utf-8", function(errors, contents) {
			response.writeHead(200, {"Content-Type" : "text/html"});
			response.write(contents);
			response.end();
		});
	}
	else if(request.url === "/css/style.css"){
		fs.readFile("./css/style.css", "utf-8", function(errors, contents) {
			response.writeHead(200, {"Content-Type" : "text/css"});
			response.write(contents);
			response.end();
		});
	}
	else {
		fs.readFile("error.html", "utf-8", function(errors, contents) {			
			response.writeHead(200, {"Content-Type" : "text/html"});
			response.write(contents);
			response.end();
		});
		// response.end("File not found!!");
	}
});

server.listen(6789);
console.log("Running in localhost at port 6789");
