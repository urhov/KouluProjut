<?php
session_start();


// Tarkista tullaanko lomakkeelta
if (isset($_POST['username']) && isset($_POST['password'])) {
    include "connect_db.php";
    // Hae tietokannasta käyttäjä jonka käyttäjänimi on sama kuin lomakkeelta annettu
    $sql = "SELECT username, users FROM user_name";
    if ("username = user_name")
        echo "username";
        else {
            echo "jotain meni pieleen"; 
        }
    // Jos käyttäjänimi löytyy, tarkistetaan salasana
    $sql = "SELECT passwd, users FROM pwd";
   if ("")
   else {
       echo "jotain meni pieleen"; 
   }

    // Jos salasana natsaa, käyttäjä päästetään sisään

}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="index.css">
    <title>kirjaudu</title>
</head>
<body>
    
    <div class="container">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
            <a class="navbar-brand" href="#"></a>
            </div>
            <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">kommenttisivusto</li>
            <li><a href="kirjaudu.php">kirjaudu</a></li>
            <li><a href="rekisteroidy.php">rekisteröidy</a></li>
            </ul>
        </div>
    </nav>        
</div>
<div class="container">
    <div class="signin">
        <div class="row">
            <form method="post" action="add_account.php">
                
                <label type="text" for="user">Käyttäjänimi:</label>
                <input type="text" name="username">    
                <br>
                <label type="password" for="pwd">salasana:</label>
                <input type="password" name="passwd">    
        
                </br><button type="submit" class="login-btn">kirjaudu</button><br>
            </form> 
        </div>
    </div>
</div>
</body>
</html>