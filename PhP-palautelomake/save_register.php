<?php 
    $name = $_POST['nimimerkki']; 
    if ( strlen($name) > 12) {
        echo "nimi on liian pitkä";
    } 
?>
<?php 
$e = $_POST['sahkoposti'];
if (strlen($mail) >20)
    echo "sähköposti on liian pitkä";
?>

<?php 
$s = $_POST['salasana'];
if (strlen($psword) > 14)
    echo "salasana on liian pitkä"; 
?>
<?php
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


