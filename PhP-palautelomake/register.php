<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="little.css">
    <title>Palaute</title>
    
</head> 
<body>

 <li>
 <a href="pankki.xml">kommentti osioon</a> 
 </li>
<?php 


function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$nameErr = $emailErr = $passwordErr = $sukupuoliErr = $commentErr = "";
$name = "";
$email = "";
$password = ""; 
$sukupuoli = "";
$comment = "";
// Tarkistaa onko tultu lomakkeen kautta
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Tarkistetaan nimi
    if (empty($_POST["nimi"])) {
        $nameErr = "* Nimeä pyydetään"; 
    } else {
        $name = test_input($_POST["nimi"]);
    }
    
    if (empty($_POST["email"])) {
         $emailErr = "* sähköpostia pyydetään"; 
    } else {
        $email = test_input($_POST["email"]);
    }
    
    if (empty($_POST["salasana"])) {
         $passwordErr = "* salasanaa pyydetään"; 
    } else {
        $password = test_input($_POST["salasana"]);
        $password = password_hash("salasana", PASSWORD_DEFAULT);
    }
    if (empty($_POST["comment"])) {
        $commentErr = "* Kommentoi!";
    } else {
        $comment = test_input($_POST["comment"]);   
    }
    
    if (empty($_POST["sukupuoli"])) {
        $sukupuoli = "* mikä on sukupuolesi?";
    } else {
        $sukupuoli = test_input($_POST["sukupuoli"]);   
    }

    $xml = simplexml_load_file('pankki.xml');

    $new_user = $xml->addChild('user');
    $new_user->addChild('nimimerkki', $name);
    $new_user->addChild('sähköposti', $email);
    $new_user->addChild('salasana', $password);
    $new_user->addChild('sukupuoli', $sukupuoli);
    $new_user->addChild('kommentti', $comment);
    $new_user->addChild('pvm', date('h:i:sa d/m/Y'));
 
    
    // tallennus 
    $dom = new DOMdocument("1.0");
    $dom->preserveWhiteSpace = false; 
    $dom->formatOutput = true; 
    $dom->loadXML($xml->asXML()); 
    $dom->save('pankki.xml');

    echo date('h:i:sa d/m/Y');  
}
?>

<h1>PalauteLomake</h1>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

    <div class="name_id">
        <br>
       <br><label for="name">nimimerkki:</label><br>
        <br><input type="text" placeholder="nimi tähän" name="nimi"><br>
        <span><?php echo $nameErr?></span>
    </div>
    
    <div class="mail_id">
        <br>
       <br><label for="email">sähköposti:</label><br>
       <br><input type="email" placeholder="sähköposti tähän" name="email"><br>
        <span><?php echo $emailErr;?></span>
    </div>

    <div class="pswd_id">
        <br>
       <br> <label for="password">salasana:</label><br>
      <br>  <input type="password" placeholder="salasana tähän" name="salasana"><br>
        <span><?php echo $passwordErr;?></span>
    </div>
    <div class="kommentti">
    <br><label for="comment">kommentoi:</label><br>
    <textarea name="comment" rows="5" cols="15"></textarea>
    <span><?php echo $commentErr?></span>
    </div>
    

    <div class="sukupuoli_id">
        <input type="radio" name="sukupuoli" value="mies">mies  
        <input type="radio" name="sukupuoli" value="nainen">nainen   
        <input type="radio" name="sukupuoli" value="muu">muu   
       <span><?php echo $sukupuoliErr;?></span>
    </div>
    <button type="submit" class="registerbtn">rekisteröidy</button>

    
 </form>
<div id="tietosi">
     nimi :        <?php echo $name;?>  
    <br>
    sähköposti :   <?php echo $email;?> 
    <br>
  sukupuoli :      <?php echo $sukupuoli;?> 
    <br>
  kommentti :        <?php echo $comment;?>
</div>
 
<?php 
$to_email = 'urkki2@gmail.com';
$subject = 'palaute varmistus';
$message = 'kiitos palautteesta!!!';
$headers = 'From: urkki2@gmail.com; \r\n;';
$headers .= 'content-Type: Type/html; charset= UTF-8;'; 

  mail($to_email, $subject, $message, $headers);
    
?> 

</body>
</html>