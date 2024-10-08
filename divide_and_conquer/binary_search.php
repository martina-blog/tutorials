<?php
function binarySearch($arr, $target)
{
    $left = 0;
    $right = count($arr) - 1;

    while ($left <= $right) {
        $mid = floor(($left + $right) / 2); // Divide
        if ($arr[$mid] === $target) {
            return $mid; // Found
        } elseif ($arr[$mid] < $target) {
            $left = $mid + 1; // Conquer right half
        } else {
            $right = $mid - 1; // Conquer left half
        }
    }
    return -1; // Not found
}

// Example usage
$sortedArray = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
echo binarySearch($sortedArray, 5); // 4
