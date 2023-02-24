<?php

include './vendor/autoload.php';

// all()
$fruits = collect(["apples", "oranges", "strawberries"]);
$fruits->all();    // ["apples", "oranges", "strawberries"]

// count()
$fruits = collect(["apples", "oranges", "strawberries"]);
$fruits->count(); //3

// filter()
collect([1, 2, 3, 4, 5, 6, 7])->filter(function ($value, $key) {
    return $value % 2 !== 0;
});

collect([1, null, 5, 7, 19, null, 24, false, '', 0, [], 50])->filter()->all();

// where()
$plants = collect([
    ["type" => "flowers", "name" => "rose"],
    ["type" => "flowers", "name" => "tulip"],
    ["type" => "trees", "name" => "pine"],
    ["type" => "trees", "name" => "birch"]
]);

$filtered = $plants->where("type", "flowers");
$filtered->all();

// each()
$collection = collect([]);
collect([1, 2, 3, 4, 5, 6, 7])->each(function ($value, $key) use ($collection) {
    if($value >= 5){
        return false;
    }

    $collection->push($value);
});

// first()
$fruits = collect(["apples", "oranges", "strawberries"]);
$fruits->first();  // "apples"

collect([1, 2, 3, 4, 5, 6, 7])->first(function ($value, $key) {
    return $value > 5;
});     // 6

// last()
$fruits = collect(["apples", "oranges", "strawberries"]);
$fruits->last();        // "strawberries"

collect([1, 2, 3, 4, 5, 6, 7])->last(function ($value, $key) {
    return $value > 5;
});         // 7

// pluck()
$plants = collect([
    ["type" => "flowers", "name" => "rose"],
    ["type" => "flowers", "name" => "tulip"],
    ["type" => "trees", "name" => "pine"],
    ["type" => "trees", "name" => "birch"]
]);

$plucked = $plants->pluck("name");
$plucked->all();  // ['rose', 'tulip', 'pine', 'birch']

$plants = collect([
    [
    "family" => "Rosaceae",
    "list" => [
        "plants" => ["firethorn", "cloudberry"],
        "fruits" => ["plum", "blackberry"]
        ],
    ],
    [
        "family" => "Liliaceae",
        "list" => [
            "plants" => ["lily", "tulip"],
        ]
    ],
    [
        "family" => "Asteraceae",
        "list" => [
            "plants" => ["stevia", "daisy", "marigold"],
            "herbs" => ["tarragon"]
        ]
    ],
    [
        "family" => "Pinaceae",
        "list" => [
            "plants" => ["evergreen", "perennial"],
            "trees" => ["hemlock", "golden larch", "fir"]
        ],
    ]
]);

$plucked = $plants->pluck("list.plants");
$plucked->all(); //  [["firethorn", "cloudberry"], ["lily", "tulip"], ["stevia","daisy","marigold"], ["evergreen","perennial"]]

// isEmpty()
collect([])->isEmpty();  // true
collect([1,2,3])->isEmpty();  //false

// contains()
$numbers = collect([1, 3, 6, 11, 37, 45, 67, 89]);
$numbers->contains(static function ($value, $key) {
    return $value % 2 === 0;
}); // true

// toArray()
$dog_breeds = collect(["basenji", "beagle", "border collie", "bichon frise", "schnauzer"]);
$dog_breeds->toArray();

// has()
$user = collect([
    "name" => "John",
    "surname" => "Doe",
    "age" => 25,
]);

$user->has("name");
$user->has("address");

// get()
$project = collect(["name" => "Weather API", "technology" => "PHP", "developer" => "John Doe"]);
$project->get("name");
$project->get("deadline", "2023-06-04");
$project->get("deadline", function() {
    return "2023-06-04";
});

// map()
$numbers = collect([10, 100, 1000, 10000, 100000]);

$new = $numbers->map(function ($item, $key) {
    return $item - 1;
});

$new->all();

// forget()
$items = collect(["vegetable" => "tomato", "fruit" => "apple", "tree" => "pine"]);
$items->forget("fruit");

$items->all();