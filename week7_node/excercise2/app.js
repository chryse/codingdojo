var http = require("http");

console.log("\n\n\nHTTP Object", http);
server = http.createServer(function(request, response) {
	//console.log("\n\n\nRequest Output\n", request);
	//console.log("\n\n\nResponse Ouuput\n", response);
	//response.writeHead(200, {'Content-type' : 'text/html'});
	//response.end('hello world');
});
console.log("\n\n\nserver object", server);
server.listen(8011);
console.log("Server running at 8011");
