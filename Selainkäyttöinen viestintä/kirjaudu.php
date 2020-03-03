<?php
session_start();



// Tarkista tullaanko lomakkeelta
if (isset($_POST['username']) && isset($_POST['passwd'])) {
    
    $username = $_POST['username'];
    $passwd = $_POST['passwd'];
     

    include "connect_db.php";

    // Hae tietokannasta käyttäjä jonka käyttäjänimi on sama kuin lomakkeelta annettu

    $stmt = $conn->prepare("SELECT user_name, email, pwd FROM users WHERE user_name = ?;");
    $stmt->bind_param("s", $username);
    $stmt->execute();


    
    // bindaus
    $stmt->bind_result($username, $email , $passwd_hash);
 

    // Jos käyttäjänimi löytyy, tarkistetaan salasana
    $stmt->fetch();
    if ($username){
        if (password_verify($passwd, $passwd_hash)){
            $_SESSION["username"] = $username;
            header("Location: index.php");
            die();
         } else {
            $_SESSION["error"] = "Salasana oli väärä!";
        }
    }   

   
    // Jos salasana natsaa, käyttäjä päästetään sisään
    // Tallennetaan sessioon käyttäjän id
    
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
    <h1>kirjaudu</h1> 
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

            <?php if (isset($_SESSION["error"])): ?>

                <div class="alert danger">
                    <?php 
                    echo $_SESSION["error"]; 
                    unset($_SESSION["error"]);
                    ?>
                </div>

            <?php endif; ?>
            <form method="post" action="kirjaudu.php">
                
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