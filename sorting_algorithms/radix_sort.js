// Function to get the maximum value in an array
function getMax(arr) {
	let max = arr[0];
	for (let i = 1; i < arr.length; i++) {
		if (arr[i] > max) {
			max = arr[i];
		}
	}
	return max;
}

// Using counting sort to sort the elements based on significant places
function countingSort(arr, exp) {
	const n = arr.length;
	const output = new Array(n).fill(0);
	const count = new Array(10).fill(0);

	// Count occurrences of digits at the current significant place
	for (let i = 0; i < n; i++) {
		count[Math.floor(arr[i] / exp) % 10]++;
	}

	// Update count[i] to store the position of the next occurrence
	for (let i = 1; i < 10; i++) {
		count[i] += count[i - 1];
	}

	// Build the output array
	for (let i = n - 1; i >= 0; i--) {
		output[count[Math.floor(arr[i] / exp) % 10] - 1] = arr[i];
		count[Math.floor(arr[i] / exp) % 10]--;
	}

	// Copy the output array to the original array
	for (let i = 0; i < n; i++) {
		arr[i] = output[i];
	}
}

// Main function to perform Radix Sort
function radixSort(arr) {
	const max = getMax(arr);

	// Perform counting sort for every digit
	for (let exp = 1; Math.floor(max / exp) > 0; exp *= 10) {
		countingSort(arr, exp);
	}

	return arr;
}

// Example usage:
let arrayToSort = [170, 45, 75, 90, 802, 24, 2, 66];
let sortedArray = radixSort(arrayToSort);
console.log("Sorted Array:", sortedArray);