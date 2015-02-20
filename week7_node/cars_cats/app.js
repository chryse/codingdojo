var http = require("http");
var fs = require("fs");
var server = http.createServer(function(request, response) {
	console.log("request url:", request.url);
	if(request.url === "/") {
		fs.readFile("index.html", "utf-8", function(errors, contents) {
			response.writeHead(200, {"Content-Type" : "text/html"});
			response.write(contents);
			response.end();
		});
	}
	else if(request.url === "/cars") {
		fs.readFile("./views/cars.html", "utf-8", function(errors, contents) {
			response.writeHead(200, {"Content-Type" : "text/html"});
			response.write(contents);
			response.end();
		});
	}
	else if(request.url === "/cats") {
		fs.readFile("./views/cats.html", "utf-8", function(errors, contents) {
			response.writeHead(200, {"Content-Type" : "text/html"});
			response.write(contents);
			response.end();
		});
	}
	else if(request.url === "/cars/new") {
		fs.readFile("./views/new.html", "utf-8", function(errors, contents) {
			response.writeHead(200, {"Content-Type" : "text/html"});
			response.write(contents);
			response.end();
		});
	}
	else if(request.url === "/stylesheets/bootstrap.min.css") {
		fs.readFile("./stylesheets/bootstrap.min.css", "utf-8", function(errors, contents) {
			response.writeHead(200, {"Content-Type" : "text/css"});
			response.write(contents);
			response.end();
		});
	}
	else if(request.url === "/stylesheets/style.css") {
		fs.readFile("./stylesheets/style.css", "utf-8", function(errors, contents) {
			response.writeHead(200, {"Content-Type" : "text/css"});
			response.write(contents);
			response.end();
		});
	}
	else if(request.url === "/js/jquery-1.10.2.min.js") {
		fs.readFile("./js/jquery-1.10.2.min.js", "utf-8", function(errors, contents) {
			response.writeHead(200, {"Content-Type" : "text/javascript"});
			response.write(contents);
			response.end();
		});
	}
	else if(request.url === "/images/car01.jpg") {
		fs.readFile("./images/car01.jpg", function(errors, contents) {
			response.writeHead(200, {"Content-Type" : "image"});
			response.write(contents);
			response.end();
		});
	}
	else if(request.url === "/images/car02.jpg") {
		fs.readFile("./images/car02.jpg", function(errors, contents) {
			response.writeHead(200, {"Content-Type" : "image"});
			response.write(contents);
			response.end();
		});
	}
	else if(request.url === "/images/car03.jpg") {
		fs.readFile("./images/car03.jpg", function(errors, contents) {
			response.writeHead(200, {"Content-Type" : "image"});
			response.write(contents);
			response.end();
		});
	}
	else if(request.url === "/images/car04.jpg") {
		fs.readFile("./images/car04.jpg", function(errors, contents) {
			response.writeHead(200, {"Content-Type" : "image"});
			response.write(contents);
			response.end();
		});
	}
	else if(request.url === "/images/car05.jpg") {
		fs.readFile("./images/car05.jpg", function(errors, contents) {
			response.writeHead(200, {"Content-Type" : "image"});
			response.write(contents);
			response.end();
		});
	}
	else if(request.url === "/images/cat01.jpg") {
		fs.readFile("./images/cat01.jpg", function(errors, contents) {
			response.writeHead(200, {"Content-Type" : "image"});
			response.write(contents);
			response.end();
		});
	}
	else if(request.url === "/images/cat02.jpg") {
		fs.readFile("./images/cat02.jpg", function(errors, contents) {
			response.writeHead(200, {"Content-Type" : "image"});
			response.write(contents);
			response.end();
		});
	}
	else if(request.url === "/images/cat03.jpg") {
		fs.readFile("./images/cat03.jpg", function(errors, contents) {
			response.writeHead(200, {"Content-Type" : "image"});
			response.write(contents);
			response.end();
		});
	}
	else if(request.url === "/images/cat04.jpg") {
		fs.readFile("./images/cat04.jpg", function(errors, contents) {
			response.writeHead(200, {"Content-Type" : "image"});
			response.write(contents);
			response.end();
		});
	}
	else if(request.url === "/images/cat05.jpg") {
		fs.readFile("./images/cat05.jpg", function(errors, contents) {
			response.writeHead(200, {"Content-Type" : "image"});
			response.write(contents);
			response.end();
		});
	}
	else {
		response.end("File not found!!");
	}
});
server.listen(7077);
console.log("Running on port 7077");