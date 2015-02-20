var circleBuilder = (function() {

	// private variables and functions
	var PI = 3.14,
			area = null,
			radius = null;

	function setArea(r) {
		area = r * r * PI;
	}

	// the object to be presented to the user
	return {
		getRadius : function() { return radius; },
		setRadius : function(r) {
									radius = r;
									setArea(r);
								},
		getArea : function() { return area; }
	}
})();

console.log(circleBuilder);

circleBuilder.setRadius(3);
console.log(circleBuilder.getArea());
circleBuilder.setRadius(4);
console.log(circleBuilder.getArea());
console.log(circleBuilder.getRadius());
