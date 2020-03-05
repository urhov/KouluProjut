 <?php
session_start();

if (!isset($_SESSION["username"])){
    echo "Ei lupaa tälle sivulle";
    die();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
</head>
<body>
<li><a href="index.php">takaisin sivulle</a></li>
</body>
</html>
<?php
if (isset($_GET['comment'])){

    $comment = $_GET["comment"]; 
    $user_id = $_SESSION["user_id"];        

    $sql = "INSERT INTO kommentit (kommentti, user_id) VALUES ('$comment', $user_id);";
  

    include_once 'connect_db.php';

    


    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
} else {
    echo "Et tullut lomakkeelta";
}
?>