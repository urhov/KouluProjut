<?php 
session_start();
date_default_timezone_set("Europe/Helsinki");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SelainKäyttöinen</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="index.css">
    <!--link rel="stylesheet" href="index.css"-->
</head>
<body>
<div class="container">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
            <a class="navbar-brand" href="#"></a>
            </div>
            <ul class="nav navbar-nav">
                <h1>kommenttisivu</h1>
            <li class="active"><a href="index.php">kommenttisivusto</li>
        
            <?php if (isset($_SESSION["username"])):?>
                <li><a href="logout.php">kirjaa ulos <?php echo $_SESSION["username"]?></a></li>   
            <?php else: ?>
                <li><a href="kirjaudu.php">kirjaudu</a></li>
                <li><a href="rekisteroidy.php">rekisteröidy</a></li>
            <?php endif; ?>
            
            </ul>
        </div>
    </nav>        
</div>
<div class="container">
    <div class="row">
            <h2>Lisää kommentti</h2>
     </div>
<div class="row">
        <form action="add_comment.php" method="get">
            <div class="form-group">
                <label for="comment">kommentoi:</label>
                <textarea name="comment" cols="30" rows="4"></textarea>
            </div>
            <button type="submit" class="btn btn-danger">lähetä</button>
        </form>                
    </div>
    <div class="row">
        <div class="col">
            <h2>kommentit</h2>
            <div class="teksti">
                <?php 
                // avaa tietokantayhteys
                include "connect_db.php";

                // tee sql-kysely
              
                // suorita kysely
                $sql = "SELECT kommentit.id, kommentti, user_id, users.user_name, aika
                FROM kommentit 
                INNER JOIN users ON kommentit.user_id = users.id";
                 
                $result = $conn->query($sql); 
                // jos tuloksia näytä ne loopissa

                while($row = $result->fetch_assoc()){
                echo  "<p>" . $row["user_name"] . "&nbsp" . $row["aika"] . "<br>" . $row["kommentti"] . "</p>";
                } 
                $conn->close();
                ?> 
            
            </div>
        </div>
    </div>
</div>

    
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


</body>
</html>