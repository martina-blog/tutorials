function solveSudoku(board) {
	solve(board);
	return board;
}

function solve(board) {
	for (let row = 0; row < 9; row++) {
		for (let col = 0; col < 9; col++) {
			if (board[row][col] === 0) { // Empty cell
				for (let num = 1; num <= 9; num++) {
					if (isValid(board, row, col, num)) {
						board[row][col] = num; // Place number
						if (solve(board)) return true; // Recursive step
						board[row][col] = 0; // Backtrack if no solution
					}
				}
				return false; // No valid number found
			}
		}
	}
	return true; // Solution found
}

function isValid(board, row, col, num) {
	// Check row
	for (let i = 0; i < 9; i++) {
		if (board[row][i] === num) return false;
	}

	// Check column
	for (let i = 0; i < 9; i++) {
		if (board[i][col] === num) return false;
	}

	// Check 3x3 subgrid
	let startRow = Math.floor(row / 3) * 3;
	let startCol = Math.floor(col / 3) * 3;
	for (let i = 0; i < 3; i++) {
		for (let j = 0; j < 3; j++) {
			if (board[startRow + i][startCol + j] === num) return false;
		}
	}

	return true;
}

// Example Usage:
let board = [
	[5, 3, 0, 0, 7, 0, 0, 0, 0],
	[6, 0, 0, 1, 9, 5, 0, 0, 0],
	[0, 9, 8, 0, 0, 0, 0, 6, 0],
	[8, 0, 0, 0, 6, 0, 0, 0, 3],
	[4, 0, 0, 8, 0, 3, 0, 0, 1],
	[7, 0, 0, 0, 2, 0, 0, 0, 6],
	[0, 6, 0, 0, 0, 0, 2, 8, 0],
	[0, 0, 0, 4, 1, 9, 0, 0, 5],
	[0, 0, 0, 0, 8, 0, 0, 7, 9]
];

console.log(solveSudoku(board));
console.table(board);