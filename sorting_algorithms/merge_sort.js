function mergeSort(arr) {
	if (arr.length <= 1) {
		return arr;
	}

	// Split the array into two halves
	const middle = Math.floor(arr.length / 2);
	const leftHalf = arr.slice(0, middle);
	const rightHalf = arr.slice(middle);

	// Recursively sort each half
	const sortedLeft = mergeSort(leftHalf);
	const sortedRight = mergeSort(rightHalf);

	// Merge the sorted halves
	return merge(sortedLeft, sortedRight);
}

function merge(left, right) {
	let result = [];
	let leftIndex = 0;
	let rightIndex = 0;

	// Compare elements from the left and right arrays and merge them
	while (leftIndex < left.length && rightIndex < right.length) {
		if (left[leftIndex] < right[rightIndex]) {
			result.push(left[leftIndex]);
			leftIndex++;
		} else {
			result.push(right[rightIndex]);
			rightIndex++;
		}
	}

	// Add any remaining elements from the left and right arrays
	return result.concat(left.slice(leftIndex)).concat(right.slice(rightIndex));
}

// Example usage:
let arrayToSort = [38, 27, 43, 3, 9, 82, 10];
let sortedArray = mergeSort(arrayToSort);
console.log("Sorted Array:", sortedArray);