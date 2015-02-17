var x = [3, 5, "Dojo", "Rocks", { name : "Michael", title : "Sensei" } ];

for(var i = 0; i < x.length; i++) {
	console.log(x[i] + ": " + typeof(x[i]));
	if(typeof(x[i]) === 'object') {
		for(item in x[i]) {
			console.log(item + ": " + typeof(item));
		}
	}
}

x.push(100);
x.push([]);
console.log(x);

var sum = 0;
for(var j = 1; j <= 500; j++){
	sum += j;
}
console.log(sum);

var milSum = 0;
var start = new Date();
var start_n = start.getTime();
console.log("Start time: " + start_n);
for(var k = 1; k <= 1000000; k++) {
	milSum += k;
}
console.log("Add form 1 to 1000000: " + milSum);
var finish = new Date();
var finish_n = finish.getTime();
console.log("Finish time: " + finish_n);
console.log("time elapse: " + (finish_n - start_n));
