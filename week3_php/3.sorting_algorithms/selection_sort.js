var selectionSort = function(arr) {

	for(var i = 0; i < arr.length; i++) {
		
		var min_index = i;

		for(var j = i+1; j < arr.length; j++) {
			if(arr[j] < arr[min_index]) {
				min_index = j;
			}
		}
		var tmp = arr[i];
		arr[i] = arr[min_index];
		arr[min_index] = tmp;
	}
	return arr;
}

var arr = [];
for (var i = 0; i < 1000; i++) {
	arr.push(Math.round(Math.random()*10000));
}
console.log(arr);
console.log(selectionSort(arr));