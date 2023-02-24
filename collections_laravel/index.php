<?php

include './vendor/autoload.php';

use Illuminate\Support\Collection;

$fruits = collect(["apples", "oranges", "strawberries"]);
$fruits->all();

$fruits = new Collection(["apples", "oranges", "strawberries"]);
$fruits->all();

