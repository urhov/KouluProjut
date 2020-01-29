<?php
phpinfo();
$users = $_GET['username, email, passwd'];

include_once 'connect_db.php';

$sql = "INSERT INTO users ('user_name, email, pwd') VALUES ('{$_GET['username, email, passwd']}');";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();