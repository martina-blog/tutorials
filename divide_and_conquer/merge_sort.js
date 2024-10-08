function mergeSort(arr) {
	if (arr.length <= 1) return arr; // Base case

	const mid = Math.floor(arr.length / 2); // Divide
	const left = mergeSort(arr.slice(0, mid)); // Conquer left half
	const right = mergeSort(arr.slice(mid)); // Conquer right half

	return merge(left, right); // Combine

	function merge(left, right) {
		const sorted = [];
		while (left.length && right.length) {
			if (left[0] < right[0]) {
				sorted.push(left.shift());
			} else {
				sorted.push(right.shift());
			}
		}
		return sorted.concat(left, right); // Combine the remaining elements
	}
}

// Example usage
const array = [38, 27, 43, 3, 9, 82, 10];
console.log(mergeSort(array)); // [3, 9, 10, 27, 38, 43, 82]