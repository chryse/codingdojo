//print 1-255
var s1 = function() {
	for (var i = 1; i <=255; i++) {
		console.log(i);
	}
}
console.log("Print 1-255");
s1();
console.log("=======================\n");

//print odd number between 1 -255
var s2 = function() {
	for (var i = 1; i <= 255; i++) {
		if (i % 2 == 1) {
			console.log(i);
		}
	}
}
console.log("Print odd number between 1 - 255");
s2();
console.log("=======================\n");

//print sum
var s3 = function() {
	var sum = 0;
	for (var i = 0; i <= 255; i++) {
		sum += i;
		console.log("New number: " + i + " Sum: " + sum);
	}
}
console.log("Print sum");
s3();
console.log("=======================\n");

//iterating through the array
var s4 = function(arr) {
	for (var i = 0; i < arr.length; i++) {
		console.log(arr[i]);
	}
}
console.log("Iternating through the array");
s4([1, 3, 5, 7, 9, 13]);
console.log("=======================\n");

//find max
var s5 = function(arr) {
	var max = arr[0];
	for (var i = 0; i < arr.length; i++) {
		if (max < arr[i]) {
			max = arr[i];
		}
	}
	console.log(max);
}
console.log("Find max");
s5([-3, -5, -7]);
console.log("=======================\n");


//get average
var s6 = function(arr) {
	var avg = sum = 0;
	for (var i = 0; i < arr.length; i++) {
		sum += arr[i];
	}
	avg = sum / arr.length;
	console.log(avg);
}
console.log("Get average");
s6([2, 10 ,3]);
console.log("=======================\n");

//array with odd number
var s7 = function() {
	var y = [];
	for(var i = 1; i <= 255; i++) {
		if (i % 2 == 1) {
			y.push(i);
		}
	}
	console.log(y);
}
console.log("Array with odd number");
s7();
console.log("=======================\n");

//greater than y
var s8 = function(arr, y) {
	var counter = 0;
	for (var i = 0; i < arr.length; i++) {
		if (arr[i] > y) {
			counter++;
		}
	}
	console.log(counter);
}
console.log("Greater than y");
s8([1, 3, 5, 7], 3);
console.log("=======================\n");

//square the values
var s9 = function(arr) {
	for (var i = 0; i < arr.length; i++) {
		arr[i] = arr[i] * arr[i];
	}
	console.log(arr);
}
console.log("Square the values");
s9([1, 5, 10, -2]);
console.log("=======================\n");

//eliminate negative numbers
var s10 = function(arr) {
	for (var i = 0; i < arr.length; i++) {
		if (arr[i] < 0) {
			arr[i] = 0;
		}
	}
	console.log(arr);
}
console.log("Eliminate negative numbers");
s10([1, 5, 10, -2]);
console.log("=======================\n");

//max, min, and average
var s11 = function(arr) {
	var max = min = arr[0];
	var avg = sum = 0;
	for (var i = 0; i < arr.length; i++) {
		if (max < arr[i]) {
			max = arr[i];
		}
		if (min > arr[i]) {
			min = arr[i];
		}
		sum += arr[i];
	}
	avg = sum / arr.length;
	console.log(max, min, avg);
}
console.log("Max, Min and Average");
s11([1, 5, 10, -2]);
console.log("=======================\n");

//shifting the values in the array
var s12 = function(arr) {
	for (var i = 0; i < arr.length-1; i++) {
		arr[i] = arr[i+1];
	}
	arr[arr.length-1] = 0;
	console.log(arr);
}
console.log("Shifting the values in the array");
s12([1, 5, 10, 7, -2]);
console.log("=======================\n");

//number to string
var s13 = function(arr) {
	for (var i = 0; i < arr.length; i++) {
		if (arr[i] < 0) {
			arr[i] = "Dojo";
		}
	}
	console.log(arr);
}
console.log("Number to string");
s13([-1, -3, 2]);
console.log("=======================\n");
