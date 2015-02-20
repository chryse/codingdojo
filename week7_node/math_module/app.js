var math = require("./mathlib.js");

var num1 = -10;
var num2 = 10;
console.log("\n\n\nApp starts!!");
console.log("add: " + num1 + "+" + num2 + " = " + math.add(num1,num2));
console.log("multiply: " + num1 + "*" + num2 + " = " + math.multiply(num1,num2));
console.log("square: " + num1 + " = " + math.square(num1));
console.log("random two numbers between "+ num1 + " " + num2 + " = " + math.random(num1,num2));