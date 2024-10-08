<?php

function closestPair($points)
{
    usort($points, function ($a, $b) {
        return $a[0] <=> $b[0]; // Sort points by x-coordinate
    });

    return closestUtil($points, 0, count($points) - 1); // Start the recursive function
}

function closestUtil($points, $left, $right)
{
    if ($right - $left <= 3) {
        return bruteForce($points, $left, $right); // Base case for small sets
    }

    $mid = floor(($left + $right) / 2);
    $midPoint = $points[$mid];

    $leftDistance = closestUtil($points, $left, $mid); // Conquer left half
    $rightDistance = closestUtil($points, $mid + 1, $right); // Conquer right half
    $d = min($leftDistance, $rightDistance); // Combine

    return min($d, stripClosest($points, $midPoint, $d, $left, $right)); // Final combine
}

function stripClosest($points, $midPoint, $d, $left, $right)
{
    $strip = [];
    for ($i = $left; $i <= $right; $i++) {
        if (abs($points[$i][0] - $midPoint[0]) < $d) {
            $strip[] = $points[$i];
        }
    }

    usort($strip, function ($a, $b) {
        return $a[1] <=> $b[1]; // Sort strip points by y-coordinate
    });

    $minDist = $d;
    $c = count($strip);
    for ($i = 0; $i < $c; $i++) {
        for ($j = $i + 1; $j < count($strip) && ($strip[$j][1] - $strip[$i][1]) < $minDist; $j++) {
            $dist = sqrt(pow($strip[$j][0] - $strip[$i][0], 2) + pow($strip[$j][1] - $strip[$i][1], 2));
            $minDist = min($minDist, $dist);
        }
    }
    return $minDist;
}

function bruteForce($points, $left, $right)
{
    $minDist = PHP_INT_MAX;
    for ($i = $left; $i < $right; $i++) {
        for ($j = $i + 1; $j <= $right; $j++) {
            $dist = sqrt(pow($points[$j][0] - $points[$i][0], 2) + pow($points[$j][1] - $points[$i][1], 2));
            $minDist = min($minDist, $dist);
        }
    }
    return $minDist;
}

// Example usage
$points = [[0, 0], [1, 1], [2, 2], [3, 3], [1, 0]];
echo closestPair($points); // Distance between the closest pair
