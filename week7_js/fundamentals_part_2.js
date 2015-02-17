var person = {
				name: "Trey",
				distance_travelled: 0,
				say_name: function() { console.log(person.name); },
				say_something: function(say) {
					console.log(person.name + " says " + say + ".");
				},
				walk: function() {
					console.log(person.name + " is walking.");
					person.distance_travelled += 3;
				},
				run: function() {
					console.log(person.name + " is running.");
					person.distance_travelled += 10;
				},
				crawl: function() {
					console.log(person.name + " is crawling.");
					person.distance_travelled += 1;
				}
}


person.say_name();
person.say_something("thank you");
person.run();
person.walk();
console.log(person.distance_travelled);

person.doSomething = function() {
	var ranNum = Math.ceil(Math.random() * 3);
	if(ranNum == 1) {
		return person.walk;
	}
	else if(ranNum == 2) {
		return person.run;
	}
	else if(ranNum == 3) {
		return person.crawl;
	}
	else {
		return false;
	}
}
console.log("======= assign function into variable ====== ");
var returned_function = person.doSomething();
returned_function();
console.log(person.distance_travelled);

person.fly = function(func1, func2) {
	var change = Math.round(Math.random() * 100);
	if(change <= 30) {
		func1();
	}
	else {
		func2();
	}
}

var func1 = function() {
	console.log("eating ice cream!");
}

var func2 = function() {
	console.log("crying at home...");
}

person.fly(func1, func2);