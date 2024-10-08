<?php
function matrixMultiply($A, $B)
{
    $n = count($A); // Assuming A and B are square matrices
    if ($n === 1) {
        return [[$A[0][0] * $B[0][0]]];
    } // Base case for 1x1 matrix

    $mid = floor($n / 2);

    // Dividing matrices into quadrants
    $A11 = getSubMatrix($A, 0, $mid, 0, $mid);
    $A12 = getSubMatrix($A, 0, $mid, $mid, $n);
    $A21 = getSubMatrix($A, $mid, $n, 0, $mid);
    $A22 = getSubMatrix($A, $mid, $n, $mid, $n);

    $B11 = getSubMatrix($B, 0, $mid, 0, $mid);
    $B12 = getSubMatrix($B, 0, $mid, $mid, $n);
    $B21 = getSubMatrix($B, $mid, $n, 0, $mid);
    $B22 = getSubMatrix($B, $mid, $n, $mid, $n);

    // Calculating intermediate products
    $M1 = matrixMultiply(addMatrices($A11, $A22), addMatrices($B11, $B22)); // (A11 + A22)(B11 + B22)
    $M2 = matrixMultiply(addMatrices($A21, $A22), $B11); // (A21 + A22)B11
    $M3 = matrixMultiply($A11, subtractMatrices($B12, $B22)); // A11(B12 - B22)
    $M4 = matrixMultiply($A22, subtractMatrices($B21, $B11)); // A22(B21 - B11)
    $M5 = matrixMultiply(addMatrices($A11, $A12), $B22); // (A11 + A12)B22
    $M6 = matrixMultiply(subtractMatrices($A21, $A11), addMatrices($B11, $B12)); // (A21 - A11)(B11 + B12)
    $M7 = matrixMultiply(subtractMatrices($A12, $A22), addMatrices($B21, $B22)); // (A12 - A22)(B21 + B22)

    // Combining results
    $C11 = addMatrices(subtractMatrices(addMatrices($M1, $M4), $M5), $M7);
    $C12 = addMatrices($M3, $M5);
    $C21 = addMatrices($M2, $M4);
    $C22 = addMatrices(subtractMatrices(addMatrices($M1, $M3), $M2), $M6);

    // Combining quadrants into a single matrix
    return combineMatrices($C11, $C12, $C21, $C22, $n);
}

function getSubMatrix($matrix, $rowStart, $rowEnd, $colStart, $colEnd)
{
    $subMatrix = [];
    for ($i = $rowStart; $i < $rowEnd; $i++) {
        $subMatrix[] = array_slice($matrix[$i], $colStart, $colEnd - $colStart);
    }
    return $subMatrix;
}

function addMatrices($A, $B)
{
    $n = count($A);
    $C = [];
    for ($i = 0; $i < $n; $i++) {
        $C[] = [];
        for ($j = 0; $j < $n; $j++) {
            $C[$i][$j] = $A[$i][$j] + $B[$i][$j];
        }
    }
    return $C;
}

function subtractMatrices($A, $B)
{
    $n = count($A);
    $C = [];
    for ($i = 0; $i < $n; $i++) {
        $C[] = [];
        for ($j = 0; $j < $n; $j++) {
            $C[$i][$j] = $A[$i][$j] - $B[$i][$j];
        }
    }
    return $C;
}

function combineMatrices($C11, $C12, $C21, $C22, $n)
{
    $C = [];
    for ($i = 0; $i < $n; $i++) {
        $C[$i] = array_merge($C11[$i], $C12[$i]);
    }
    for ($i = 0; $i < $n; $i++) {
        $C[] = array_merge($C21[$i], $C22[$i]);
    }
    return $C;
}

// Example usage
$A = [
    [1, 2],
    [3, 4],
];
$B = [
    [5, 6],
    [7, 8],
];
print_r(matrixMultiply($A, $B)); // [[19, 22], [43, 50]]
