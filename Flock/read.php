<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../connect.php';
include_once '../objects/orders.php';

// Connect to DB
$dbh = ConnectDB();

// initialize object
$flock = new Flock($dbh);

// query here
$stmt = $flock->read();
$num = $stmt->rowCount();

if($num > 0){


    $flock_arr = array();
    $flock_arr["Farm"] = array(); 
    

    // get table
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        extract($row);

        $flock_item = array(
            // database items needed will be listed here
              "farm_id" => $id,
              "farm_name" => $name,
              "farm_address" => $address,
              "farm_bldg" => $building,
              "coop_id" => $coopId,
              "coop_count" => $coopCount,
              "birds_per_coop" => $birdsPerCoop,
              "bird_type_id" => $birdTypeId,
              "bird_breed" => $birdBreed,
              "default_price" => $price
             
        );

        array_push($flock_arr["Farm"], $flock_item); 
    }

    // set response code 
    http_response_code(200);
    // show data on page in json format
    echo json_encode($flock_arr);
}
// if no data is found
else {
    // set response code
    http_response_code(404);
    echo json_encode(
        array("message" => "Flock data not found.")
    );
}
?>