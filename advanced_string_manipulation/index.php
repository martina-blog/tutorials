<?php

// String examples
$name = 'John';
$message = "Hello, $name!";
$heredoc = <<<EOD
This is a heredoc string.
It can span multiple lines.
EOD;

$nowdoc = <<<'EOD'
This is a nowdoc string.
It also supports multiple lines,
but doesn't parse variables.
EOD;

// String manipulation functions
$hello = "Hello, world!";
$length = strlen($hello); // returns 13
$upper = strtoupper($hello); // returns "HELLO, WORLD!"
$lower = strtolower($hello); // returns "hello, world!"
$substring = substr($hello, 0, 5); // returns "Hello"
$replace = str_replace("world", "PHP", $hello); // returns "Hello, PHP!"

// Advanced string manipulation functions
$hello = "   Hello, world!   ";
$trimmed = trim($hello); // returns "Hello, world!"
$padded = str_pad($hello, 20, "-"); // returns "---Hello, world!----"
$words = explode(",", $hello); // returns ["Hello", " world!"]
$joined = implode("-", $words); // returns "Hello- world!"
$reversed = strrev($hello); // returns "!dlrow ,olleH   "