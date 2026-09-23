<?php

if ($_SERVER["REQUEST_METHOD"] !== "POST") {

    echo json_encode([
        "success" => false,
        "message" => "Invalid request method."
    ]);

    exit;
}

$n = (int) ($_POST["n"] ?? 0);

$animals = [

    [
        "name" => "Bear",
        "image" => "images/bear.jpg"
    ],

    [
        "name" => "Crocodile",
        "image" => "images/crocodile.jpg"
    ],

    [
        "name" => "Deer",
        "image" => "images/deer.jpg"
    ],

    [
        "name" => "Dolphin",
        "image" => "images/dolphin.jpg"
    ],

    [
        "name" => "Eagle",
        "image" => "images/eagle.jpg"
    ],

    [
        "name" => "Elephant",
        "image" => "images/elephant.jpg"
    ],

    [
        "name" => "Fox",
        "image" => "images/fox.jpg"
    ],

    [
        "name" => "Giraffe",
        "image" => "images/giraffe.jpg"
    ],

    [
        "name" => "Horse",
        "image" => "images/horse.jpg"
    ],

    [
        "name" => "Kangaroo",
        "image" => "images/kangaroo.jpg"
    ],

    [
        "name" => "Lion",
        "image" => "images/lion.jpg"
    ],

    [
        "name" => "Panda",
        "image" => "images/panda.jpg"
    ],

    [
        "name" => "Parrot",
        "image" => "images/parrot.jpg"
    ],

    [
        "name" => "Penguin",
        "image" => "images/penguin.jpg"
    ],

    [
        "name" => "Rabbit",
        "image" => "images/rabbit.jpg"
    ],

    [
        "name" => "Shark",
        "image" => "images/shark.jpg"
    ],

    [
        "name" => "Tiger",
        "image" => "images/tiger.jpg"
    ],

    [
        "name" => "Turtle",
        "image" => "images/turtle.jpg"
    ],

    [
        "name" => "Wolf",
        "image" => "images/wolf.jpg"
    ],

    [
        "name" => "Zebra",
        "image" => "images/zebra.jpg"
    ]

];


$animalCount = count($animals);


if ($n < 1 || $n > $animalCount) {

    echo json_encode([

        "success" => false,

        "message" =>
            "Please enter a number between 1 and "
            . $animalCount . "."

    ]);

    exit;
}

$selectedAnimals = array_slice(
    $animals,
    0,
    $n
);


$response = [

    "success" => true,

    "animals" => $selectedAnimals

];


echo json_encode($response);

?>