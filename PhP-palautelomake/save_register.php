<?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["nimimerkki"])) {
            $nameErr = "Nimeä pyydetään"; 
        } else {
            $name_id = test_input($_POST["name_id"]);
        }
        if (empty($_POST["sahkoposti"])) {
            $mailErr = "Nimeä pyydetään"; 
        } else {
            $mail_id = test_input($_POST["sahkoposti"]);
        }
        if (empty($_POST["salasana"])) {
            $passwordErr = "Nimeä pyydetään"; 
        } else {
            $psword_id = test_input($_POST["salasana"]);
        }
        if (empty($_POST["salasana uudestaan"])) {
            $pswordErr = "Nimeä pyydetään"; 
        } else {
            $psword_id = test_input($_POST["salasana uudestaan"]);
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
$new_user->addChild('sähköposti', $mail);
$new_user->addChild('salasana', $psword);
$new_user->addChild('sukupuoli', 'mies');


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
echo nimi;
echo "<br>";
echo "sahkoposti";
echo "<br>";
echo "sukupuoli";
echo "<br>";
?>

