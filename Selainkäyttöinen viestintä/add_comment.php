<?php
session_start();
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
include_once 'add_account.php';
if (isset($_GET['username'])){
    if (isset($_GET['comment'])){

        $sql = "INSERT INTO kommentit (kommentti) VALUES ('{$_GET['comment']}');";
        $kommentti = $_GET['comment'];
   
        include_once 'connect_db.php';
   
        $sql = "INSERT INTO kommentit (kommentti) VALUES ('{$_GET['comment']}');";
   
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