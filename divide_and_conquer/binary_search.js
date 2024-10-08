function binarySearch(arr, target) {
	let left = 0;
	let right = arr.length - 1;

	while (left <= right) {
		const mid = Math.floor((left + right) / 2); // Divide
		if (arr[mid] === target) {
			return mid; // Found
		} else if (arr[mid] < target) {
			left = mid + 1; // Conquer right half
		} else {
			right = mid - 1; // Conquer left half
		}
	}
	return -1; // Not found
}

// Example usage
const sortedArray = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
console.log(binarySearch(sortedArray, 5)); // 4