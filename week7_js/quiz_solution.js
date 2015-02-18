console.log(hello);
var hello = "hello";
// undefined

var funky = "hi";
test();
function test() {
	var funky = "hello";
	console.log(funky);
}
// "hello"

var jay = "awesome";
function print() {
	jay = "super";
	console.log(jay);
}
console.log(jay);
// "awesome"

var food = "chicken";
console.log(food);
eat();
function eat() {
	food = "half-chicken";
	console.log(food);
	var food = "gone";
}
console.log(food);
// chicken
// half-chicken
// chicken

function caller(a, b, c) {
	console.log(a);
	console.log(c(b(a)));
	return b(a);
}

var result = caller(5, function(num) {
	var sum = num;
	for(var i = 0; i < num; i++) {
		sum -= i;
	}
	return sum;
}, function(num) {
	if(num > 0) return num;
	else return 0;
})
console.log(result);
