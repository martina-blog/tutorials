<?php
function mergeSort($arr)
{
    if (count($arr) <= 1) {
        return $arr;
    } // Base case

    $mid = floor(count($arr) / 2); // Divide
    $left = mergeSort(array_slice($arr, 0, $mid)); // Conquer left half
    $right = mergeSort(array_slice($arr, $mid)); // Conquer right half

    return merge($left, $right); // Combine
}

function merge($left, $right)
{
    $sorted = [];
    while (count($left) && count($right)) {
        if ($left[0] < $right[0]) {
            $sorted[] = array_shift($left);
        } else {
            $sorted[] = array_shift($right);
        }
    }
    return array_merge($sorted, $left, $right); // Combine the remaining elements
}

// Example usage
$array = [38, 27, 43, 3, 9, 82, 10];
print_r(mergeSort($array)); // [3, 9, 10, 27, 38, 43, 82]