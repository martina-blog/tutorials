<?php
function isPalindrome($input)
{
    $alphanumeric = preg_replace("/[^a-z0-9]/i", '', strtolower($input));
    return $alphanumeric === strrev($alphanumeric);
}

// Example usage:
$input = "A man, a plan, a canal: Panama";
if (isPalindrome($input)) {
    echo "The input is a palindrome.";
} else {
    echo "The input is not a palindrome.";
}