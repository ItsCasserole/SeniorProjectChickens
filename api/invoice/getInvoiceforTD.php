<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/database.php';
include_once '../objects/invoice.php';

$database = new Database();
$db = $database->getConnection();

$invoice = new Invoice($db);

// set ID property of record to read
$invoice->truck_driver_id = isset($_GET['user_id']) ? $_GET['user_id'] : die();


$stmt = $invoice->getInvoiceListTD();
$num = $stmt->rowCount();
if($num>0){
        $invoice_arr=array();
        $invoice_arr["records"]=array();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                extract($row);
                $invoice_item=array(
                        "invoice_id" => $invoice_id,
                );
                array_push($invoice_arr["records"], $invoice_item);
        }
        http_response_code(200);
        echo json_encode($invoice_arr);
}else{
        http_response_code(404);
        echo json_encode(
                array("message" => "No store found.")
        );
}
?>

