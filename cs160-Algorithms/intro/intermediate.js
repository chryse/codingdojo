// swapping two values
var js1 = function(arr) {
	var tmp = arr[0];
	arr[0] = arr[arr.length-1];
	arr[arr.length-1] = tmp;
	console.log(arr);
}
console.log("Swapping two values");
console.log("[2, 3, 5, 7, 6]");
js1([2, 3, 5, 7, 6]);
console.log("=======================\n");

//reverse order
var js2 = function(arr) {
	var last = arr.length-1;
	for (var i = 0; i < arr.length / 2; i++) {
		var tmp = arr[i];
		arr[i] = arr[last];
		arr[last] = tmp;
		last--;
	}
	console.log(arr);
}
console.log("Reverse order");
console.log("[1, 3, 5, 7, 2]");
js2([1, 3, 5, 7, 2]);
console.log("=======================\n");

//insert x in y
var js3 = function(arr, value, index) {
	var tmp = []
	for (var i = 0; i < index; i++) {
		tmp.push(arr[i]);
	}
	tmp[index] = value;
	for (var j = index; j < arr.length; j++) {
		tmp.push(arr[j]);
	}
	console.log(tmp);
}
console.log("Insert X in Y");
console.log("[1, 3, 5, 7], 10, 2");
js3([1, 3, 5, 7], 10, 2);
console.log("=======================\n");

var js3 = function(arr, value, index) {
	arr.push(value);
	for (var i = arr.length-1; i > index; i--) {
		var tmp = arr[i];
		arr[i] = arr[i-1];
		arr[i-1] = tmp;
	}
	console.log(arr);
}
console.log("Insert X in Y version 2(no temporary array making)");
console.log("[1, 3, 5, 7], 10, 2");
js3([1, 3, 5, 7], 10, 2);
console.log("=====================\n");

//remove last two value
var js4 = function(arr) {
	if (arr.length <= 2) {
		arr = [];
	}
	else {
		arr.pop();
		arr.pop();
	}
	console.log(arr);
}
console.log("Remove last two value");
console.log("[1, 3, 5, 7]");
js4([1, 3, 5, 7]);
console.log("[1, 3, 5]");
js4([1, 3, 5]);
console.log("[1, 3]");
js4([1, 3]);
console.log("[]");
js4([]);
console.log("=======================\n");

//remove negatives
var js5 = function(arr) {
	var last = arr.length-1;
	for (var i = last; i >= 0; i--) {
		if (arr[i] < 0) {
			var tmp = arr[i];
			arr[i] = arr[arr.length-1];
			arr[arr.length-1] = tmp;
			arr.pop();
			last--;
		}
	}
	console.log(arr);
}
var arr1 = [-1, -3, 3, -5, 2];
var arr2 = [1, 2, 3, 4, -5];
var arr3 = [1, -2, 3, 4, -5];
var arr4 = [-1, -2, -3, -4, -5];
var arr5 = [-1, -3, 3, -5, 2];
console.log("Remove negatives");
console.log(arr1);
js5(arr1);
console.log(arr2);
js5(arr2);
console.log(arr3);
js5(arr3);
console.log(arr4);
js5(arr4);
console.log(arr5);
js5(arr5);
console.log("=======================\n");

var js5 = function(arr) {
	var len = arr.length;
	for(var i = 0; i < len; i++) {
		arr.push(arr[0]);
		for(var j = 1; j < arr.length; j++) {
			arr[j-1] = arr[j];
		}
		if (arr[arr.length -1] < 0) {
			arr.pop();
			arr.pop();
		}
		else {
			arr.pop();
		}
	}
	console.log(arr);
}
var arr1 = [-1, -3, 3, -5, 2];
var arr2 = [1, 2, 3, 4, -5];
var arr3 = [1, -2, 3, 4, -5];
var arr4 = [-1, -2, -3, -4, -5];
var arr5 = [-1, -3, 3, -5, 2];
console.log("Remove negatives nested for loop");
console.log(arr1);
js5(arr1);
console.log(arr2);
js5(arr2);
console.log(arr3);
js5(arr3);
console.log(arr4);
js5(arr4);
console.log(arr5);
js5(arr5);
console.log("=======================\n");

