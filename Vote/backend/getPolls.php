<?php 
//get all polls from database

include_once 'pdo-connect.php';

try {
    $stmt = $conn->prepare("SELECT id, topic, start, end, user_id FROM poll");

if ($stmt->execute() == false){
    $data = array(
        'error' => 'Error occured'
    );
} else {
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $data = $result;
    }
} catch (PDOException $e) {

    $data = array(
        'error' => 'tapahtui virhe tallennuksessa!!'
    );

}

header("Content-type: application/json;charset=utf-8");
echo json_encode($data);
