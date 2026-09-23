<?php

if ($_SERVER["REQUEST_METHOD"] !== "POST") {

    echo json_encode([
        "success" => false,
        "message" => "Invalid request method."
    ]);

    exit;
}

$name = $_POST["studentName"] ?? "";
$password = $_POST["password"] ?? "";
$gender = $_POST["gender"] ?? "";
$course = $_POST["course"] ?? "";
$studentId = $_POST["studentId"] ?? "";


if (
    empty($name) ||
    empty($password) ||
    empty($gender) ||
    empty($course) ||
    empty($studentId)
) {

    echo json_encode([
        "success" => false,
        "message" => "Please fill in all required fields."
    ]);

    exit;
}


if (
    !isset($_FILES["profilePhoto"]) ||
    $_FILES["profilePhoto"]["error"] !== UPLOAD_ERR_OK
) {

    echo json_encode([
        "success" => false,
        "message" => "Please upload a valid file."
    ]);

    exit;
}


$fileName = $_FILES["profilePhoto"]["name"];
$fileTmpName = $_FILES["profilePhoto"]["tmp_name"];
$fileSize = $_FILES["profilePhoto"]["size"];



$response = [

    "success" => true,

    "name" => $name,

    "gender" => $gender,

    "course" => $course,

    "studentId" => $studentId,

    "fileName" => $fileName

];

echo json_encode($response);

?>