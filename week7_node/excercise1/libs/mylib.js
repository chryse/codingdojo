module.exports = function(app) {
	return {
		log_app: function() { console.log(app);},
		sum: function(a, b) { return a+b; },
		Person: function Person(name) {
			this.name = name;
			this.introduce = function() {
				console.log("My name is", this.name);
			}
		}
	}
}

// exports.sum = function(a,b) {
// 	return a+b;
// };

// exports.Person = function Person(name) {
// 	this.name = name;
// 	this.introduce = function() {
// 		console.log("My name is", this.name);
// 	};
// };