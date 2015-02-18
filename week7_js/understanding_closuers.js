function MathSample() {
	this.storage = [];
	for(var i = 0; i < 10; i++) {
		this.storage[i] = function() {
			console.log(i);
		}
	}
	i = 20;
}

var math = new MathSample();

for(var j = 0; j < 10; j++) {
	math.storage[j]();
}