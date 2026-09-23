<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Q2 - Student Grade</title>

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
            width: 400px;
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
            padding: 18px;
            background: #f1f5f9;
            border-radius: 10px;
            color: #243b55;
        }

        .result h2 {
            margin-bottom: 10px;
        }

        .result p {
            margin: 6px 0;
            font-size: 17px;
        }
    </style>
</head>

<body>

    <div class="container">

        <h1>Student Grade Calculator</h1>

        <form action="prob2.php" method="POST">

            <label for="marks">Enter Marks</label>

            <input
                type="number"
                id="marks"
                name="marks"
                min="0"
                max="100"
                placeholder="Enter marks (0 - 100)"
                required
            >

            <button type="submit">
                Calculate Grade
            </button>

        </form>


        <?php

        function calculateGrade($marks)
        {
            if ($marks >= 90) {
                return "A+";
            }
            elseif ($marks >= 80) {
                return "A";
            }
            elseif ($marks >= 70) {
                return "B";
            }
            elseif ($marks >= 60) {
                return "C";
            }
            elseif ($marks >= 40) {
                return "D";
            }
            else {
                return "F";
            }
        }


        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $marks = (int) $_POST["marks"];

            $grade = calculateGrade($marks);

            echo "
                <div class='result'>
                    <h2>Result</h2>
                    <p><strong>Marks:</strong> $marks</p>
                    <p><strong>Grade:</strong> $grade</p>
                </div>
            ";
        }

        ?>

    </div>

</body>
</html>