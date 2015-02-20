var Cat = function Cat(cat_name) {
	if(!(this instanceof Cat)) return new Cat(cat_name);
	this.name = cat_name;
	this.getName = function() {
		return this.name;
	};
};

var muffin = new Cat("muffin");
var biscuit = Cat("biscuit");

console.log(muffin);
console.log(biscuit);
