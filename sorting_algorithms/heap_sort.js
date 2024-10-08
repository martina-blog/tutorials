function heapSort(arr) {
	buildMaxHeap(arr);

	for (let i = arr.length - 1; i > 0; i--) {
		// Swap the root (maximum element) with the last element
		[arr[0], arr[i]] = [arr[i], arr[0]];

		// Heapify the reduced heap
		heapify(arr, i, 0);
	}

	return arr;
}

function buildMaxHeap(arr) {
	const n = arr.length;

	// Build a max heap from the bottom up
	for (let i = Math.floor(n / 2) - 1; i >= 0; i--) {
		heapify(arr, n, i);
	}
}

function heapify(arr, n, i) {
	let largest = i;
	const left = 2 * i + 1;
	const right = 2 * i + 2;

	// Check if left child is larger than root
	if (left < n && arr
		> arr[largest]) {
		largest = left;
	}

	// Check if right child is larger than the largest so far
	if (right < n && arr
		> arr[largest]) {
		largest = right;
	}

	// If the largest element is not the root, swap them and recursively heapify the affected sub-tree
	if (largest !== i) {
		[arr[i], arr[largest]] = [arr[largest], arr[i]];
		heapify(arr, n, largest);
	}
}

// Example usage:
let arrayToSort = [12, 11, 13, 5, 6, 7];
let sortedArray = heapSort(arrayToSort);
console.log("Sorted Array:", sortedArray);