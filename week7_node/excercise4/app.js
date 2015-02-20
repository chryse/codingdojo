var http = require("http");
var fs = require("fs");
var server = http.createServer(function(request, response){
	if(request.url === "/"){
		fs.readFile("index.html", "utf-8", function(errors, contents) {
			response.writeHead(200, {"Content-type" : "text/html"});
			response.write(contents);
			response.end();
		});
	}
	else if(request.url === "/style/style.css"){
		fs.readFile("./style/style.css", "utf-8", function(errors, contents){
			response.writeHead(200, {"Content-type" : "text/css"});
			response.write(contents);
			response.end();
		});
	}
	else if(request.url === "/script/script.js"){
		fs.readFile("./script/script.js", function(errors, contents){
			response.writeHead(200, {"Content-type" : "text/javascript"});
			response.write(contents);
			response.end();
		});
	}
	else if(request.url == "/script/jquery-1.10.2.min.js"){
		fs.readFile("./script/jquery-1.10.2.min.js", function(errors, contents){
			response.writeHead(200, {"Content-type" : "text/javascript"});
			response.write(contents);
			response.end();
		});
	}
	else if(request.url === "/img/close.png"){
		fs.readFile("./img/close.png", function(errors, contents){
			response.writeHead(200, {"Content-type" : "image"});
			response.write(contents);
			response.end();
		});
	}
	else {
		response.end("File not found!!");
	}
});

server.listen(8080);
console.log("Running in localhost at port 8080");
