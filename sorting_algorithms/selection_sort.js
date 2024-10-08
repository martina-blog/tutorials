function selectionSort(arr) {
	let len = arr.length;

	for (let i = 0; i < len - 1; i++) {
		// Assume the current index is the minimum
		let minIndex = i;

		// Check the rest of the array to find the minimum element
		for (let j = i + 1; j < len; j++) {
			if (arr[j] < arr[minIndex]) {
				minIndex = j;
			}
		}

		// Swap the found minimum element with the element at the current index
		let temp = arr[i];
		arr[i] = arr[minIndex];
		arr[minIndex] = temp;
	}

	return arr;
}

// Example usage:
let arrayToSort = [64, 25, 12, 22, 11];
let sortedArray = selectionSort(arrayToSort);
console.log("Sorted Array:", sortedArray);