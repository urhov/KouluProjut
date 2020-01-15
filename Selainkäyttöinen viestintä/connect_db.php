<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "viestiseina";

$errors = [];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    $errors[] = $conn->connect_error;
    die("Connection failed: " . $conn->connect_error);
}

if (!$conn->set_charset("utf8")) {
    $errors[] = "Error loading character set utf8:" . $conn->error;
    exit();
} else {
    $errors[] = "Current character set: " . $conn->character_set_name();
}

echo "<script>console.log('Connected successfully')</script>";