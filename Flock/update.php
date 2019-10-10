<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// include database and object files
include_once '../connect.php';
include_once '../objects/flock.php';
 
// get database connection

$dbh = ConnectDB();
 
// prepare flock object
$flock = new Flock($dbh);
 
// get id of product to be edited
$data = json_decode(file_get_contents("php://input"));
 
// set ID property of product to be edited
$flock->id = $data->id;
 
// set product property values... changed when db table complete
$flock->name = $data->farm_name;
$flock->address = $data->farm_address;
$flock->building = $data->farm_bldg;
$flock->coopCount = $data->coop_count;
$flock->birdsPerCoop = $data->birds_per_coop;
$flock->birdBreed = $data->bird_breed;
$flock->price = $data->default_price;
 
// update the product
if($flock->update()){
 
    // set response code - 200 ok
    http_response_code(200);
 
    // tell the user
    echo json_encode(array("message" => "Flock was updated."));
}
 
// if unable to update , tell the user
else{
 
    // set response code - 503 service unavailable
    http_response_code(503);
 
    // tell the user
    echo json_encode(array("message" => "Unable to update flock."));
}
?>


 
    