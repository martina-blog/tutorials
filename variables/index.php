<?php

$name = "John";
$surname = "Doe";

$first_name = "Julia";
$_1stname = "Vilma";


$fruit = "banana";
$secondfruit = &$fruit;

echo "First fruit: " . $fruit . "\n";

echo "Second fruit:  ". $secondfruit. "\n";

$secondfruit = "orange";

echo "First fruit: " . $fruit . "\n";
echo "Second fruit: " . $secondfruit . "\n";

$sample = "lorem";
$$sample = "ipsum dolor";

echo "$sample ${$sample}". "\n";
echo "$sample $lorem" . "\n";
