<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Q4(ii) - Animal Names</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #141e30, #243b55);
        }

        .container {
            width: 600px;
            max-width: 90%;
            padding: 35px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
            text-align: center;
        }

        h1 {
            color: #243b55;
            margin-bottom: 10px;
        }

        .subtitle {
            color: #666;
            margin-bottom: 25px;
        }

        label {
            display: block;
            text-align: left;
            font-weight: bold;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 12px;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            margin-bottom: 20px;
        }

        input:focus {
            outline: none;
            border-color: #243b55;
        }

        button {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 8px;
            background: #243b55;
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background: #141e30;
            transform: translateY(-2px);
        }

        .result {
            margin-top: 25px;
            padding: 20px;
            background: #f1f5f9;
            border-radius: 10px;
            color: #243b55;
        }

        .animals {
            margin-top: 15px;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
        }

        .animal {
            padding: 12px;
            background: white;
            border-radius: 8px;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <div class="container">

        <h1>Animal Names</h1>

        <p class="subtitle">
            Display N animal names using a PHP array
        </p>


        <?php

        $animals = [

            "Lion",
            "Tiger",
            "Elephant",
            "Leopard",
            "Cheetah",
            "Jaguar",
            "Wolf",
            "Fox",
            "Bear",
            "Panda",

            "Giraffe",
            "Zebra",
            "Rhinoceros",
            "Hippopotamus",
            "Gorilla",
            "Chimpanzee",
            "Orangutan",
            "Kangaroo",
            "Koala",
            "Sloth",

            "Rabbit",
            "Deer",
            "Horse",
            "Cow",
            "Buffalo",
            "Goat",
            "Sheep",
            "Camel",
            "Donkey",
            "Pig",

            "Dog",
            "Cat",
            "Monkey",
            "Squirrel",
            "Otter",
            "Beaver",
            "Badger",
            "Raccoon",
            "Hedgehog",
            "Porcupine",

            "Dolphin",
            "Whale",
            "Shark",
            "Octopus",
            "Seal",
            "Walrus",
            "Starfish",
            "Jellyfish",
            "Seahorse",
            "Stingray",

            "Crocodile",
            "Alligator",
            "Turtle",
            "Snake",
            "Lizard",
            "Chameleon",
            "Iguana",
            "Gecko",
            "Frog",
            "Salamander",

            "Eagle",
            "Owl",
            "Parrot",
            "Peacock",
            "Sparrow",
            "Pigeon",
            "Flamingo",
            "Penguin",
            "Swan",
            "Ostrich",

            "Crow",
            "Duck",
            "Swan",
            "Turkey",
            "Woodpecker",
            "Kingfisher",
            "Hawk",
            "Falcon",
            "Vulture",
            "Pelican",

            "Ant",
            "Bee",
            "Butterfly",
            "Dragonfly",
            "Mosquito",
            "Grasshopper",
            "Beetle",
            "Ladybug",
            "Spider",
            "Scorpion"

        ];

        $animalCount = count($animals);

        ?>

        <form action="prob4_ii.php" method="POST">

            <label for="n">
                Enter N
            </label>

            <input
                type="number"
                id="n"
                name="n"
                min="1"
                max="<?php echo $animalCount; ?>"
                placeholder="Enter number of animals"
                required>

            <button type="submit">
                Display Animals
            </button>

        </form>


        <?php

        function displayAnimals($n, $animals)
        {
            echo "<div class='result'>";

            echo "<h2>$n Animal Names</h2>";

            echo "<div class='animals'>";

            for ($i = 0; $i < $n; $i++) {

                echo "<div class='animal'>";
                echo ($i + 1) . ". " . $animals[$i];
                echo "</div>";
            }

            echo "</div>";
            echo "</div>";
        }

        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $n = (int) $_POST["n"];

            if ($n < 1 || $n > $animalCount) {

                echo "
                <div class='result'>
                    <h2>Invalid Input</h2>
                    <p>Please enter a number between 1 and $animalCount.</p>
                </div>
            ";
            } else {

                displayAnimals($n, $animals);
            }
        }

        ?>

    </div>

</body>

</html>