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


<?php 

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$nameErr = $emailErr = $passwordErr = $sukupuoliErr = "";
$name = "";
$email = "";
$password = ""; 
$sukupuoli = "";

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

    // tallennus 
    $dom = new DOMdocument("1.0");
    $dom->preserveWhiteSpace = false; 
    $dom->formatOutput = true; 
    $dom->loadXML($xml->asXML()); 
    $dom->save('pankki.xml');
    
}
?>

<h1>PalauteLomake</h1>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

    <div id="name_id">
        <br>
        <label for="name">nimimerkki:</label>
        <input type="text" placeholder="nimi tähän" name="nimi">
        <span><?php echo $nameErr?></span>
    </div>
    
    <div id="mail_id">
        <br>
        <label for="email">sähköposti:</label>
        <input type="email" placeholder="sähköposti tähän" name="email">
        <span><?php echo $emailErr;?></span>
    </div>

    <div id="pswd_id">
        <br>
        <label for="password">salasana:</label>
        <input type="password" placeholder="salasana tähän" name="salasana">
        <span><?php echo $passwordErr;?></span>
    </div>

    <div id="sukupuoli_id">
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
  
</div>
 
<?php 
$to_email = 'urkki2@gmail.com';
$subject = 'testi';
$message = 'tämä lähtee phpllä.';
$headers = 'From: urkki2@gmail.com; \r\n;';
$headers .= 'content-Type: Type/html; charset=UTF-8;'; 
   mail($to_email, $subject, $message, $headers);
   echo "tämä on lähetetty php:llä";

?>
    

</body>
</html>