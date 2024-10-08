<?php

function isAnagram($word1, $word2)
{
    $word1 = str_replace(' ', '', strtolower($word1));
    $word2 = str_replace(' ', '', strtolower($word2));

    if (strlen($word1) !== strlen($word2)) {
        return false;
    }

    $charCount = [];
    $word1Len = strlen($word1);

    for ($i = 0; $i < $word1Len; $i++) {
        $char = $word1[$i];
        $charCount[$char] = isset($charCount[$char]) ? $charCount[$char] + 1 : 1;
    }

    $word2Len = strlen($word2);
    for ($i = 0; $i < $word2Len; $i++) {
        $char = $word2[$i];
        if (!isset($charCount[$char])) {
            return false;
        }
        $charCount[$char]--;
        if ($charCount[$char] === 0) {
            unset($charCount[$char]);
        }
    }

    return empty($charCount);
}

// Example usage:
$word1 = "listen";
$word2 = "silent";
if (isAnagram($word1, $word2)) {
    echo "The words are anagrams.";
} else {
    echo "The words are not anagrams.";
}