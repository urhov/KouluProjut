<?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["nimimerkki"])) {
            $nameErr = "Nimeä pyydetään"; 
        } else {
            $name_id = test_input($_POST["name_id"]);
        }
        if (empty($_POST["sähköposti"])) {
            $mailErr = "sähköpostia pyydetään"; 
        } else {
            $mail_id = test_input($_POST["sahkoposti"]);
        }
        if (empty($_POST["salasana"])) {
            $passwordErr = "salasanaa pyydetään"; 
        } else {
            $password_id = test_input($_POST["salasana"]);
        }
      
    }
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
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
    $dom->save('pankki.xml')
    ?>
<?php
if (new DOMdocument("1.0")) {
    echo "Tietosi on tallennettu";
}
?>
<?php
echo "<h2>Tallennetut tietosi</h2>"; 
echo "nimi";
echo "<br>";
echo "sähköposti";
echo "<br>";
echo "sukupuoli";
echo "<br>";
?>

