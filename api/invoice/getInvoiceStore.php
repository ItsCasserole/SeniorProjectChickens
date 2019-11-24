<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');

include_once '../config/database.php';
include_once '../objects/invoice.php';

//database connection
$database = new Database();
$db = $database->getConnection();

// initialize invoice obj
$invoice = new Invoice($db);

// set ID property of record to read
$invoice->invoice_id = isset($_GET['invoice_ID']) ? $_GET['invoice_ID'] : die();

// get user details
$invoice->getInvoiceStoreinfo();
if($invoice->store_name!=null){

    // create array
    $storeinfo_arr = array(
        "invoice_date" =>  $invoice->invoice_date,
        "store_name" => $invoice->store_name,
        "store_address" => $invoice->store_address,
    );

    // set response code - 200 OK
    http_response_code(200);

    // make it json format
    echo json_encode($storeinfo_arr);
}
else{

    // set response code - 404 Not found
    http_response_code(404);

    // tell user does not exist
    echo json_encode(array("message" => "Store Information does not exist."));
}
?>
