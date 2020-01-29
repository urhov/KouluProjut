<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bootstrap.min.css">  
    <link rel="stylesheet" href="index.css">      
    <title>rekisteroidy</title>
</head>
<body>
    <h1>rekisteröidy</h1>
    <div class="container">
<nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
            <a class="navbar-brand" href="#"></a>
            </div>
            <ul class="nav navbar-nav">
                <h1>rekisteröidy</h1>
            <li class="active"><a href="index.php">kommenttisivusto</li>
            <li><a href="kirjaudu.php">kirjaudu</a></li>
            <li><a href="rekisteroidy.php">rekisteröidy</a></li>
            </ul>
        </div>
    </nav>        
</div>
<div class="container">
<form action="add_account.php" method="get">
<div class="name">
        <br><label for="nimi">nimi</label>
        <br><input type="text" placeholder="Nimi tähän" name="username">
    </div>
    <div class="email">
        <br><label for="email">sähköposti</label>
        <br><input type="email" placeholder="sähköposti tähän" name="email">
    </div>
    <div class="password">
        <br><label for="salasana">salasana</label>
        <br><input type="password" placeholder="salasana tähän" name="passwd">
    </div>
    <button type="submit" class="register-btn">rekisteröidy</button>
</div>





</form>
    


</body>
</html>