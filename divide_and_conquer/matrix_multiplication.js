function matrixMultiply (A, B) {
	const n = A.length; // Assuming A and B are square matrices
	if (n === 1) return [[A[0][0] * B[0][0]]]; // Base case for 1x1 matrix

	const mid = Math.floor(n / 2);

	// Dividing matrices into quadrants
	const A11 = getSubMatrix(A, 0, mid, 0, mid);
	const A12 = getSubMatrix(A, 0, mid, mid, n);
	const A21 = getSubMatrix(A, mid, n, 0, mid);
	const A22 = getSubMatrix(A, mid, n, mid, n);

	const B11 = getSubMatrix(B, 0, mid, 0, mid);
	const B12 = getSubMatrix(B, 0, mid, mid, n);
	const B21 = getSubMatrix(B, mid, n, 0, mid);
	const B22 = getSubMatrix(B, mid, n, mid, n);

	// Calculating intermediate products
	const M1 = matrixMultiply(addMatrices(A11, A22), addMatrices(B11, B22)); // (A11 + A22)(B11 + B22)
	const M2 = matrixMultiply(addMatrices(A21, A22), B11); // (A21 + A22)B11
	const M3 = matrixMultiply(A11, subtractMatrices(B12, B22)); // A11(B12 - B22)
	const M4 = matrixMultiply(A22, subtractMatrices(B21, B11)); // A22(B21 - B11)
	const M5 = matrixMultiply(addMatrices(A11, A12), B22); // (A11 + A12)B22
	const M6 = matrixMultiply(subtractMatrices(A21, A11), addMatrices(B11, B12)); // (A21 - A11)(B11 + B12)
	const M7 = matrixMultiply(subtractMatrices(A12, A22), addMatrices(B21, B22)); // (A12 - A22)(B21 + B22)

	// Combining results
	const C11 = addMatrices(subtractMatrices(addMatrices(M1, M4), M5), M7);
	const C12 = addMatrices(M3, M5);
	const C21 = addMatrices(M2, M4);
	const C22 = addMatrices(subtractMatrices(addMatrices(M1, M3), M2), M6);

	// Combining quadrants into a single matrix
	return combineMatrices(C11, C12, C21, C22, n);
}

function getSubMatrix (matrix, rowStart, rowEnd, colStart, colEnd) {
	const subMatrix = [];
	for (let i = rowStart; i < rowEnd; i++) {
		subMatrix.push(matrix[i].slice(colStart, colEnd));
	}
	return subMatrix;
}

function addMatrices (A, B) {
	const n = A.length;
	const C = [];
	for (let i = 0; i < n; i++) {
		C.push([]);
		for (let j = 0; j < n; j++) {
			C[i][j] = A[i][j] + B[i][j];
		}
	}
	return C;
}

function subtractMatrices (A, B) {
	const n = A.length;
	const C = [];
	for (let i = 0; i < n; i++) {
		C.push([]);
		for (let j = 0; j < n; j++) {
			C[i][j] = A[i][j] - B[i][j];
		}
	}
	return C;
}

function combineMatrices (C11, C12, C21, C22, n) {
	const C = [];
	for (let i = 0; i < n; i++) {
		C.push([...C11[i], ...C12[i]]);
	}
	for (let i = 0; i < n; i++) {
		C.push([...C21[i], ...C22[i]]);
	}
	return C;
}

// Example usage
const A = [
	[1, 2],
	[3, 4],
];
const B = [
	[5, 6],
	[7, 8],
];
console.log(matrixMultiply(A, B)); // [[19, 22], [43, 50]]
