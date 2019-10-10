<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// get database connection
include_once '../connect.php';
 
// instantiate flock object
include_once '../objects/flock.php';
 

$dbh = ConnectDB();
 
$flock = new Flock($dbh);
 
// get posted data
$data = json_decode(file_get_contents("php://input"));
 
// make sure data is not empty
if(
    !empty($data->farm_name) &&
    !empty($data->farm_address) &&
    !empty($data->farm_bldg) &&
    !empty($data->coop_count) &&
    !empty($data->birds_per_coop) &&
    !empty($data->bird_breed) && 
    !empty($data->default_price)
){
 
    // set product property values
    $flock->name = $data->farm_name;
    $flock->address = $data->farm_address;
    $flock->building = $data->farm_bldg;
    $flock->coopCount = $data->coop_count;
    $flock->birdsPerCoop = $data->birds_per_coop;
    $flock->birdBreed = $data->bird_breed;
    $flock->price = $data->default_price;
 
    // create the flock
    if($flock->create()){
 
        // set response code - 201 created
        http_response_code(201);
 
        // tell the user
        echo json_encode(array("message" => "flock was created."));
    }
 
    // if unable to create the product, tell the user
    else{
 
        // set response code - 503 service unavailable
        http_response_code(503);
 
        // tell the user
        echo json_encode(array("message" => "Unable to create flock."));
    }
}
 
// tell the user data is incomplete
else{
 
    // set response code - 400 bad request
    http_response_code(400);
 
    // tell the user
    echo json_encode(array("message" => "Unable to create flock. Data is incomplete."));
}
?>