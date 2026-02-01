<?php
$conn = new mysqli('localhost' , 'root'  ,'' , 'myopject');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully";
?>