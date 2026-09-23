<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Q4 - PHP Arrays</title>

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
            width: 500px;
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

        .result h2 {
            margin-bottom: 12px;
        }

        .numbers {
            font-size: 18px;
            font-weight: bold;
            line-height: 1.8;
            word-spacing: 8px;
        }

        .section {
            margin-top: 30px;
            padding-top: 25px;
            border-top: 2px solid #eee;
        }
    </style>
</head>

<body>

    <div class="container">

        <h1>PHP Array Operations</h1>

        <p class="subtitle">
            Sort N numbers using a PHP array
        </p>


        <form action="prob4_i.php" method="POST">

            <label for="numbers">Enter Numbers</label>

            <input
                type="text"
                id="numbers"
                name="numbers"
                placeholder="Example: 45 12 89 3 25"
                required>

            <button type="submit">
                Sort Numbers
            </button>

        </form>


        <?php

        function sortNumbers($input)
        {
            $numbers = explode(" ", $input);

            $numbers = array_map('intval', $numbers);

            echo "<div class='result'>";

            echo "<h2>Original Array</h2>";

            echo "<div class='numbers'>";
            echo implode(" ", $numbers);
            echo "</div>";


            sort($numbers);

            echo "<h2>Sorted Array</h2>";

            echo "<div class='numbers'>";
            echo implode(" ", $numbers);
            echo "</div>";

            echo "</div>";
        }


        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $input = $_POST["numbers"];

            sortNumbers($input);
        }

        ?>

    </div>

</body>

</html>