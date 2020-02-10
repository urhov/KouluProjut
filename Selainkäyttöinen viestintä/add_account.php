<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <li><a href="index.php">takaisin</a></li>
</body>
</html>
<?php
include_once 'connect_db.php';

$username = $_GET['user_name'];
$email = $_GET['email'];
$passwd = $_GET['passwd'];

$stmt = $conn->prepare("INSERT INTO users (user_name, email, pwd) VALUES (?,?,?);");
$stmt->bind_param("sss", $username, $email, $passwd);

if ($stmt->execute()) {
    echo "Käyttäjä luotu";
} else {
    echo "kirjautumisen kanssa tuli ongelma" . $sql . "<br>" . $conn->error;
}

$conn->close();