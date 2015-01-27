var bubbleSort = function(array) {

	var isSwapped = false;

	if(!isSwapped) {

		for(var i = 0; i < array.length; i++) {

			for(var j = 0; j < array.length; j++) {

				if(array[j] > array[i]) {
					var tmp = array[j];
					array[j] = array[i];
					array[i] = tmp;
					isSwapped = true;
				}
			}
		}	
	}
	
	return array;

}

var arr = [];
for (var i = 0; i < 10000; i++) {
	arr.push(Math.round(Math.random() * 100));
}

console.log(bubbleSort(arr));