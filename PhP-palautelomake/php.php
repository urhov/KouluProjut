<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="little.css">
    <title>Palaute</title>
    
</head>
<body>

<?php 

$nameErr = "";
$name = "";
$email = "";
$password = ""; 
$sukupuoli = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Tarkistetaan nimi
    if (empty($_POST["nimi"])) {
        $nameErr = "* Nimeä pyydetään"; 
    } else {
        $name = test_input($_POST["nimi"]);
    }
     if (empty($_POST["sahkoposti"])) {
         $emailErr = "* sähköpostia pyydetään"; 
     } else {
        $mail_id = test_input($_POST["sahkoposti"]);
     }
     if (empty($_POST["* salasana"])) {
         $passwordErr = "* Nimeä pyydetään"; 
     } else {
         $psword_id = test_input($_POST["salasana"]);
     }
    if (empty($_POST["sukupuoli"])) {
        $sukupuoli = "* mikä on sukupuolesi?";
    } else {
        $sukupuoli = test_input($_POST["sukupuoli"]);
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
   
// $xml = simplexml_load_file('pankki.xml');

// $new_user = $xml->addChild('user');
// $new_user->addChild('nimimerkki', $name);
// $new_user->addChild('sähköposti', $mail);
// $new_user->addChild('salasana', $psword);
// $new_user->addChild('sukupuoli', 'mies');


// tallennus 
// $dom = new DOMdocument("1.0");
// $dom->preserveWhiteSpace = false; 
// $dom->formatOutput = true; 
// $dom->loadXML($xml->asXML()); 
// $dom->save('pankki.xml')

?>

<h1>PalauteLomake</h1>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

    <div id="name_id">
        <br>
        <label for="name">nimimerkki:</label>
        <input type="text" placeholder="nimi tähän" name="nimi">
        <span><?php echo $nameErr ?></span>
    </div>
    
    <div id="mail_id">
        <br>
        <label for="email">sähköposti:</label>
        <input type="email" placeholder="sähköposti tähän" name="sahkoposti">
        <span><?php echo $emailErr;?></span>
    </div>

    <div id="pswd_id">
        <br>
        <label for="password">salasana:</label>
        <input type="password" placeholder="salasana tähän" name="salasana">
        <span><?php echo $passwordErr;?></span>
    </div>

    
        <input type="radio" name="sukupuoli" value="mies">mies        
        <input type="radio" name="sukupuoli" value="nainen">nainen  
        <input type="radio" name="sukupuoli" value="muu">muu  
        <span><?php echo $sukupuoli;?></span>
        <br><br>
    <button type="submit" class="registerbtn">rekisteröidy</button>
</form>

<div id="tietosi">
    Nimi : <?php echo $name;?>
    sähköposti : <?php>echo $email;?>
    sukupuoli : <?php>echo $
</div>
 

    

</body>
</html>