<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/database.php';
include_once '../invoices/getTomorrowsInvoices.php';

$database = new Database();
$db = $database->getConnection();

$invoice = new Invoice($db);

$stmt = $invoice->getTomorrowsInvoices();

$invoices = array();
foreach($stmt->fetchAll() as $row){
    
}
