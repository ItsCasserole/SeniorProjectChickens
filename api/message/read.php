<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// include database and object files
include_once '../config/database.php';
include_once '../objects/message.php';

// instantiate database and farm object
$database = new Database();
$db = $database->getConnection();

// initialize object
$message = new Message($db);

// query farms
$stmt = $message->read();
$num = $stmt->rowCount();

/// check if more than 0 record found
if($num>0){
    // farms array
    $message_arr=array();
    $message_arr["records"]=array();

    // retrieve our table contents
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);

        $message_item=array(
            "message_id" => $message_id,
            "user_ID" => $user_ID,
            "content" => $content,
            "timestamp" => $timestamp
        );

        array_push($message_arr["records"], $message_item);
    }

    // set response code - 200 OK
    http_response_code(200);

    // show farm data in json format
    echo json_encode($message_arr);
}else{
    // set response code - 404 Not found
    http_response_code(404);
    // tell the user no farms found
    echo json_encode(
        array("meesage" => "No messages found.")
    );
}
?>
