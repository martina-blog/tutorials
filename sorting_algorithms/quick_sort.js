function quickSort(arr) {
	if (arr.length <= 1) {
		return arr;
	}

	// Choose a pivot element (in this example, the middle element)
	const pivot = arr[Math.floor(arr.length / 2)];

	// Partition the array into two halves
	const left = arr.filter(element => element < pivot);
	const middle = arr.filter(element => element === pivot);
	const right = arr.filter(element => element > pivot);

	// Recursively sort the left and right halves and concatenate them
	return quickSort(left).concat(middle, quickSort(right));
}

// Example usage:
let arrayToSort = [38, 27, 43, 3, 9, 82, 10];
let sortedArray = quickSort(arrayToSort);
console.log("Sorted Array:", sortedArray);