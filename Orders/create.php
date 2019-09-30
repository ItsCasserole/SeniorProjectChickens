<?php

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../connect.php';

include_once '../entities/orders.php';

$dbclass = new DBClass();
$connection = $dbclass->getConnection();

$orders = new Orders($connection);

$data = json_decode(file_get_contents("php://input"));

$orders->name = $data->name;
$orders->price = $data->price;
$orders->description = $data->description;
$orders->category_id = $data->category_id;
$orders->created = date('Y-m-d H:i:s');

if($orders->create()){
    echo '{';
        echo '"message": "Order was created."';
    echo '}';
}
else{
    echo '{';
        echo '"message": "Unable to create order."';
    echo '}';
}
?>
