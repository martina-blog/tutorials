<?php
// Define a constant
define("NAME", "Hanna");
echo "My name is " . NAME . "\n";

const YEAR = 2000;
echo "Favorite year: " . YEAR . "\n";

const FRUITS = ['banana', 'orange', 'apple'];
echo "Favorite  fruit: " . FRUITS[1] . "\n";

//echo NOT_CONSTANT;

// check if a constant exists
if(defined("SOME_CONSTANT"))
    echo "The constant exists.";

//var_dump( get_defined_constants());

//magic constants
echo "Full file path: " . __FILE__ . "\n";
echo "Path to the directory: " . __DIR__ . "\n";

function example(){
    echo "Function name is " . __FUNCTION__. "\n";
}

example();


