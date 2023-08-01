<?php
function areParenthesesBalanced($str) {
    $stack = [];
    $opening = ['(', '[', '{'];
    $closing = [')', ']', '}'];

    for ($i = 0; $i < strlen($str); $i++) {
        $char = $str[$i];
        if (in_array($char, $opening)) {
            array_push($stack, $char);
        } elseif (in_array($char, $closing)) {
            if (empty($stack) || array_pop($stack) != $opening[array_search($char, $closing)]) {
                return false;
            }
        }
    }

    return empty($stack);
}

// Example usage:
$input = "({[]})";
if (areParenthesesBalanced($input)) {
    echo "Parentheses are balanced. \n";
} else {
    echo "Parentheses are not balanced. \n";
}