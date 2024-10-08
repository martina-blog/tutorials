function insertionSort(arr) {
	let len = arr.length;

	for (let i = 1; i < len; i++) {
		// Choose the current element to be inserted
		let currentElement = arr[i];

		// Compare with elements before it and move them to the right
		let j = i - 1;
		while (j >= 0 && arr[j] > currentElement) {
			arr[j + 1] = arr[j];
			j--;
		}

		// Insert the current element in the correct position
		arr[j + 1] = currentElement;
	}

	return arr;
}

// Example usage:
let arrayToSort = [12, 11, 13, 5, 6];
let sortedArray = insertionSort(arrayToSort);
console.log("Sorted Array:", sortedArray);