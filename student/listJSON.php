<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

$conn = new mysqli($servername,$username,$password,$dbname);

if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM students";

$result = $conn->query($sql);

header('Content-Type: application/json; charset=utf-8');
if ($result->num_rows > 0){
    $row = array();
    http_response_code(201);
    while ($r = $result->fetch_assoc()){
        $row[] = $r;
    }
    echo json_encode($row);

} else {
    print [];
}
$conn->close();

