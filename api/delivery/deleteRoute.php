<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/database.php';
include_once '../objects/delivery.php';

$database = new Database();
$db = $database->getConnection();

$del = new Delivery($db);

$truck_driver_id = $_POST['truck_driver_id'];

$del->truck_driver_id = $truck_driver_id;

if($del->deleteRoute()){
    echo json_encode(array("message" => "success"));
}
else{
    echo json_encode(array("message" => "fail"));
}
?>
