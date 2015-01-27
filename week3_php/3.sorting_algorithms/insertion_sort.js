var insertionSort = function(arr) {

	for(var i = 0; i < arr.length-1; i++) {

		var min_index = i;

		for(var j = i + 1; j > 0; j--) {
			console.log(j, min_index, arr[min_index]);
			if(arr[j] < arr[j-1]) {
				// var tmp = arr[j];
				// arr[j] = arr[j-1];
				// arr[j-1] = tmp;
			}
			else {
				// break;
			}

			min_index  = j;
			
		}
		console.log("\n");
		var tmp = arr[min_index];
		arr[min_index] = arr[i];
		arr[i] = tmp;
	}
	return arr;
}


var arr = [];
for (var i = 0; i < 5; i++) {
	arr.push(Math.round(Math.random()*100));
}
console.log(arr);
console.log("result:")
console.log(insertionSort(arr));