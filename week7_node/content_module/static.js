module.exports = function(request, response) {

	var fs = require("fs");
	var path = require("path");
	var urlpath = path.parse(request.url);

	var type = { html : "text/html",
				 css  : "text/css",
				 js   : "text/javascript",
				 image: "image"
				}

	if(request.url === "/") {
		fs.readFile("index.html", "utf-8", function(errors, contents) {
			write_content(type.html, contents);
		});
	}
	// protect the private folder
	else if(request.url === "/private" ||
			request.url === "/private/" ||
			request.url === "/private/" + urlpath.name + ".html" ||
			request.url === "/private/" + urlpath.name + urlpath.ext) {
		response.end("File not found!! Get out of here!!");
	}
	else if(urlpath.ext === "") {
		fs.readFile("./views/" + urlpath.name + ".html", "utf-8", function(errors, contents) {
			write_content(type.html, contents);
		});
	}
	else if(urlpath.ext === ".css") {
		fs.readFile("." + urlpath.dir + "/" + urlpath.base, "utf-8", function(errors, contents) {
			write_content(type.css, contents);
		});
	}
	else if(urlpath.ext === ".js") {
		fs.readFile("." + urlpath.dir + "/" + urlpath.base, "utf-8", function(errors, contents) {
			write_content(type.js, contents);
		});
	}
	else if(urlpath.ext === ".jpg") {
		fs.readFile("." + urlpath.dir + "/" + urlpath.base, function(errors, contents) {
			write_content(type.image, contents);
		});
	}
	else {
		response.end("File not found!!");
	}

	// write head and contents info
	function write_content(type, contents) {
		response.writeHead(200, { "Content-Type" : type });
		response.write(contents);
		response.end();
	}
}