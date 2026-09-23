<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Q3 - Odd Numbers</title>

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
            width: 450px;
            padding: 35px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
            text-align: center;
        }

        h1 {
            margin-bottom: 25px;
            color: #243b55;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            text-align: left;
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
            transform: translateY(-2px);
            background: #141e30;
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
            font-size: 20px;
            font-weight: bold;
            word-spacing: 8px;
            line-height: 1.8;
        }
    </style>
</head>

<body>

    <div class="container">

        <h1>Odd Numbers Generator</h1>

        <form action="prob3.php" method="POST">

            <label for="n">Enter N</label>

            <input
                type="number"
                id="n"
                name="n"
                min="1"
                placeholder="Enter a positive number"
                required>

            <button type="submit">
                Display Odd Numbers
            </button>

        </form>


        <?php

        function displayOddNumbers($n)
        {
            echo "<div class='result'>";

            echo "<h2>Odd Numbers from 1 to $n</h2>";

            echo "<div class='numbers'>";

            for ($i = 1; $i <= $n; $i++) {

                if ($i % 2 != 0) {
                    echo $i . " ";
                }
            }

            echo "</div>";
            echo "</div>";
        }


        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $n = (int) $_POST["n"];

            displayOddNumbers($n);
        }

        ?>

    </div>

</body>

</html>