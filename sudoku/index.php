<?php
function solveSudoku(&$board)
{
    return solve($board);
}

function solve(&$board)
{
    for ($row = 0; $row < 9; $row++) {
        for ($col = 0; $col < 9; $col++) {
            if ($board[$row][$col] == 0) { // Empty cell
                for ($num = 1; $num <= 9; $num++) {
                    if (isValid($board, $row, $col, $num)) {
                        $board[$row][$col] = $num; // Place number
                        if (solve($board)) {
                            return true;
                        } // Recursive step
                        $board[$row][$col] = 0; // Backtrack if no solution
                    }
                }
                return false; // No valid number found
            }
        }
    }
    return true; // Solution found
}

function isValid($board, $row, $col, $num)
{
// Check row
    for ($i = 0; $i < 9; $i++) {
        if ($board[$row][$i] == $num) {
            return false;
        }
    }

// Check column
    for ($i = 0; $i < 9; $i++) {
        if ($board[$i][$col] == $num) {
            return false;
        }
    }

// Check 3x3 subgrid
    $startRow = floor($row / 3) * 3;
    $startCol = floor($col / 3) * 3;
    for ($i = 0; $i < 3; $i++) {
        for ($j = 0; $j < 3; $j++) {
            if ($board[$startRow + $i][$startCol + $j] == $num) {
                return false;
            }
        }
    }

    return true;
}

// Example Usage:
$board = [
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

if (solveSudoku($board)) {
    echo "Sudoku solved successfully:\n";
    foreach ($board as $row) {
        echo implode(" ", $row)."\n";
    }
} else {
    echo "No solution exists for the given Sudoku puzzle.\n";
}