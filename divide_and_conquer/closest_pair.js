function closestPair(points) {
	points.sort((a, b) => a[0] - b[0]); // Sort points by x-coordinate

	function closestUtil(points, left, right) {
		if (right - left <= 3) {
			return bruteForce(points, left, right); // Base case for small sets
		}

		const mid = Math.floor((left + right) / 2);
		const midPoint = points[mid];

		const leftDistance = closestUtil(points, left, mid); // Conquer left half
		const rightDistance = closestUtil(points, mid + 1, right); // Conquer right half
		const d = Math.min(leftDistance, rightDistance); // Combine

		return Math.min(d, stripClosest(points, midPoint, d, left, right)); // Final combine
	}

	function stripClosest(points, midPoint, d, left, right) {
		const strip = [];
		for (let i = left; i <= right; i++) {
			if (Math.abs(points[i][0] - midPoint[0]) < d) {
				strip.push(points[i]);
			}
		}

		strip.sort((a, b) => a[1] - b[1]); // Sort strip points by y-coordinate

		let minDist = d;
		for (let i = 0; i < strip.length; i++) {
			for (let j = i + 1; j < strip.length && (strip[j][1] - strip[i][1]) < minDist; j++) {
				const dist = Math.sqrt(Math.pow(strip[j][0] - strip[i][0], 2) + Math.pow(strip[j][1] - strip[i][1], 2));
				minDist = Math.min(minDist, dist);
			}
		}
		return minDist;
	}

	function bruteForce(points, left, right) {
		let minDist = Infinity;
		for (let i = left; i < right; i++) {
			for (let j = i + 1; j <= right; j++) {
				const dist = Math.sqrt(Math.pow(points[j][0] - points[i][0], 2) + Math.pow(points[j][1] - points[i][1], 2));
				minDist = Math.min(minDist, dist);
			}
		}
		return minDist;
	}

	return closestUtil(points, 0, points.length - 1);
}

// Example usage
const points = [[0, 0], [1, 1], [2, 2], [3, 3], [1, 0]];
console.log(closestPair(points)); // Distance between the closest pair
