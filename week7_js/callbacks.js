var randomName = function() {
	var names = ["George", "Mike", "Joe", "Ninja"];
	var ranNum = Math.floor(Math.random() * 4);
	return names[ranNum];
}

var say = function(x) {
	console.log("Say", x);
}

var yell = function(x) {
	console.log("Yell", x);
}

var eat = function(x) {
	console.log("Eat", x);
}

var roll = function(x) {
	console.log("Roll", x);
}

function random_function(a, x, y, z, f) {
	x(randomName());
	y(randomName());
	z(randomName());
	f(randomName());
}

random_function(randomName, say, yell, eat, roll);