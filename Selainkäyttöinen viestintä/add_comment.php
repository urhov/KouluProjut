<?php

$kommentti = $_GET['comment'];

include_once 'connect_db.php';

$sql = "INSERT INTO kommentit (kommentti) VALUES ('{$_GET['comment']}');";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();