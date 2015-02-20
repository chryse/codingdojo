var app = 5;
var mylib = require("./libs/mylib")(app);

console.log(mylib.sum(3,5));
var p = new mylib.Person("Jun");
console.log("p", p);
mylib.log_app();
p.introduce();

console.log("starting app.js");