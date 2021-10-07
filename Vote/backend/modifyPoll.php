
<?php
session_start();
// check if user is logged in
if (!isset($_SESSION['user_id'])){
    $data = array(
        'error' => 'You are not allowed here'
    );
    
    die();
}

$json = file_get_contents('php://input');
$pollData = json_decode($json);

$data = array();

include_once 'pdo-connect.php';


// update Poll-table 
try {
$stmt = $conn->prepare("UPDATE poll SET topic = :topic, start = :start, end = :end 
                                WHERE id = :id ;");
    $stmt->bindParam(":topic", $pollData->topic);
    $stmt->bindParam(":start", $pollData->start);
    $stmt->bindParam(":end", $pollData->end);
    $stmt->bindParam(":id", $pollData->id);

    if($stmt->execute() == false){
        $data['error'] = 'error modyfing poll!';
    } else {
        $data['success'] = 'poll edit successfull';
        }

} catch (PDOException $e){
    $data['error'] = $e->getmessage();
}

try {
    // update options-table
    foreach ($pollData->options as $option){
    if(isset($option->id)){
    $stmt = $conn->prepare("UPDATE option SET name = :name WHERE id = :id;");
    $stmt->bindParam(":name", $option->name);
    $stmt->bindParam(":id", $option->id);
    } else {
    $stmt = $conn->prepare("INSERT INTO option (name, poll_id)
                            VALUES (:name, :pollid)");
    $stmt->bindParam(":name", $option->name);
    $stmt->bindParam(":pollid", $pollData->id);
}
 
    }

if($stmt->execute() == false){
    $data['error'] = 'error modyfing poll!';
} else {
    $data['success'] = 'poll edit successfull';
    }

} 
catch (PDOException $e){
$data['error'] = $e->getmessage();
}

//delete options 
try {
foreach ($pollData->todelete as $option){
    
    $stmt = $conn->prepare("DELETE FROM option WHERE id = :id;");
    $stmt->bindParam(":id", $option->id);
    
if($stmt->execute() == false){
    $data['error'] = 'error deleting option!';
} else {
    $data['success'] = 'option delete successfull';
        }
    }
}  
catch (PDOException $e){
$data['error'] = $e->getmessage();
}

header("Content-type: application/json;charset=utf-8");
echo json_encode($data);


?>