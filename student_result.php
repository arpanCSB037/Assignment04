<?php

$host = "localhost";
$username = "root";
$password = "YOUR PASSWORD";
$database = "5thSemWebTechLab";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {

    $conn = new mysqli(
        $host,
        $username,
        $password,
        $database
    );
} catch (mysqli_sql_exception $e) {

    echo json_encode([
        "success" => false,
        "message" => "Database connection failed."
    ]);

    exit;
}


if ($_SERVER["REQUEST_METHOD"] !== "POST") {

    echo json_encode([
        "success" => false,
        "message" => "Invalid request method."
    ]);

    $conn->close();
    exit;
}


$action = $_POST["action"] ?? "";


function calculateGrade($average)
{
    if ($average >= 90) {
        return "A+";
    } elseif ($average >= 80) {
        return "A";
    } elseif ($average >= 70) {
        return "B";
    } elseif ($average >= 60) {
        return "C";
    } elseif ($average >= 40) {
        return "D";
    } else {
        return "F";
    }
}


/* Add Student */

if ($action === "add") {

    $rollNo = trim($_POST["rollNo"] ?? "");
    $name = trim($_POST["name"] ?? "");

    $mathematics = $_POST["mathematics"] ?? "";
    $physics = $_POST["physics"] ?? "";
    $programming = $_POST["programming"] ?? "";
    $electronics = $_POST["electronics"] ?? "";


    if ($rollNo === "" || $name === "") {

        echo json_encode([
            "success" => false,
            "message" => "Roll number and name are required."
        ]);

        $conn->close();
        exit;
    }


    if (
        $mathematics === "" ||
        $physics === "" ||
        $programming === "" ||
        $electronics === ""
    ) {

        echo json_encode([
            "success" => false,
            "message" => "All subject marks are required."
        ]);

        $conn->close();
        exit;
    }


    $mathematics = (int) $mathematics;
    $physics = (int) $physics;
    $programming = (int) $programming;
    $electronics = (int) $electronics;


    if (
        $mathematics < 0 || $mathematics > 100 ||
        $physics < 0 || $physics > 100 ||
        $programming < 0 || $programming > 100 ||
        $electronics < 0 || $electronics > 100
    ) {

        echo json_encode([
            "success" => false,
            "message" => "Marks must be between 0 and 100."
        ]);

        $conn->close();
        exit;
    }


    $sql = "
        INSERT INTO students_res
        (
            roll_no,
            name,
            mathematics,
            physics,
            programming,
            electronics
        )
        VALUES (?, ?, ?, ?, ?, ?)
    ";


    try {

        $stmt = $conn->prepare($sql);

        $stmt->bind_param(
            "ssiiii",
            $rollNo,
            $name,
            $mathematics,
            $physics,
            $programming,
            $electronics
        );

        $stmt->execute();

        echo json_encode([
            "success" => true,
            "message" => "Student added successfully."
        ]);

        $stmt->close();
    } catch (mysqli_sql_exception $e) {

        if ($e->getCode() === 1062) {

            echo json_encode([
                "success" => false,
                "message" => "This roll number already exists."
            ]);
        } else {

            echo json_encode([
                "success" => false,
                "message" => "Student could not be added."
            ]);
        }
    }


    $conn->close();
    exit;
}


/* Search Student */

if ($action === "search") {

    $rollNo = trim($_POST["rollNo"] ?? "");


    if ($rollNo === "") {

        echo json_encode([
            "success" => false,
            "message" => "Please enter a roll number."
        ]);

        $conn->close();
        exit;
    }


    $sql = "
        SELECT
            roll_no,
            name,
            mathematics,
            physics,
            programming,
            electronics
        FROM students_res
        WHERE roll_no = ?
    ";


    try {

        $stmt = $conn->prepare($sql);

        $stmt->bind_param(
            "s",
            $rollNo
        );

        $stmt->execute();

        $result = $stmt->get_result();


        if ($result->num_rows === 0) {

            echo json_encode([
                "success" => false,
                "message" => "Student not found."
            ]);

            $stmt->close();
            $conn->close();
            exit;
        }


        $student = $result->fetch_assoc();


        // Subject-wise marks array
        $marks = [
            "Mathematics" => (int) $student["mathematics"],
            "Physics" => (int) $student["physics"],
            "Programming" => (int) $student["programming"],
            "Electronics" => (int) $student["electronics"]
        ];


        $total = array_sum($marks);

        $average = $total / count($marks);

        $grade = calculateGrade($average);


        $response = [

            "success" => true,

            "student" => [
                "roll_no" => $student["roll_no"],
                "name" => $student["name"]
            ],

            "marks" => $marks,

            "total" => $total,

            "average" => round($average, 2),

            "grade" => $grade
        ];


        echo json_encode($response);

        $stmt->close();
    } catch (mysqli_sql_exception $e) {

        echo json_encode([
            "success" => false,
            "message" => "Could not search student."
        ]);
    }


    $conn->close();
    exit;
}


/* View All Students */

if ($action === "view_all") {

    $sql = "
        SELECT
            roll_no,
            name,
            mathematics,
            physics,
            programming,
            electronics
        FROM students_res
        ORDER BY roll_no
    ";


    try {

        $stmt = $conn->prepare($sql);

        $stmt->execute();

        $result = $stmt->get_result();

        $students = [];


        while ($student = $result->fetch_assoc()) {

            $marks = [
                "Mathematics" => (int) $student["mathematics"],
                "Physics" => (int) $student["physics"],
                "Programming" => (int) $student["programming"],
                "Electronics" => (int) $student["electronics"]
            ];


            $total = array_sum($marks);

            $average = $total / count($marks);

            $grade = calculateGrade($average);


            $students[] = [

                "roll_no" => $student["roll_no"],

                "name" => $student["name"],

                "marks" => $marks,

                "total" => $total,

                "average" => round($average, 2),

                "grade" => $grade
            ];
        }


        echo json_encode([
            "success" => true,
            "students" => $students
        ]);


        $stmt->close();
    } catch (mysqli_sql_exception $e) {

        echo json_encode([
            "success" => false,
            "message" => "Could not retrieve students."
        ]);
    }


    $conn->close();
    exit;
}


echo json_encode([
    "success" => false,
    "message" => "Invalid action."
]);


$conn->close();
