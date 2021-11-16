<?php
$data = json_decode(file_get_contents("php://input"), true);
echo $data;
//    print_r($data['email']);
//        $name = $_POST['full_name'];
//        $email = $_POST['email'];
//        $birthday = $_POST['birthday'];
//        $gender = $_POST['gender'];
//        $address = $_POST['address'];

$full_name = $data['full_name'];
$email = $data['email'];
$birthday = $data['birthday'];
$gender = $data['gender'];
$address = $data['address'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "INSERT INTO students (full_name,birthday,email,gender,address) VALUES ('$full_name','$birthday','$email','$gender','$address')";

// config response data kiểu json
header('Content-Type: application/json; charset=utf-8');
$data = new stdClass();
if ($conn->query($sql) === TRUE) {
    $data->message = 'Action success';
    http_response_code(201);
} else {
    $data->message = 'Action fails';
    http_response_code(500);
}
echo json_encode($data);

$conn->close();

