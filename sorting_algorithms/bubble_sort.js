function bubbleSort(arr) {
	let len = arr.length;
	let swapped;

	do {
		swapped = false;

		for (var i = 0; i < len - 1; i++) {
			if (arr[i] > arr[i + 1]) {
				// Swap elements if they are in the wrong order
				var temp = arr[i];
				arr[i] = arr[i + 1];
				arr[i + 1] = temp;

				swapped = true;
			}
		}
	} while (swapped);

	return arr;
}

// Example usage:
let arrayToSort = [64, 34, 25, 12, 22, 11, 90];
let sortedArray = bubbleSort(arrayToSort);
console.log("Sorted Array:", sortedArray);