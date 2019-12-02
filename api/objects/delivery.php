<?php
    class Delivery{
	private $conn;

	public $driver_id;
	public $truck_id;
	public $truck_driver_id;
	public $stop_number;	

	public function __construct($db){
	    $this->conn = $db;
	}

	function setTruckDriver(){
	    $truck = $this->truck_id;
	    $driver = $this->driver_id;

	    $query = "SELECT insertDriverTruckCombo('$driver', '$truck');";
	    $stmt = $this->conn->prepare($query);
	    $stmt->execute();
	    return $stmt;
	}

	function setRouteStop($stop, $store_id){
	    $truck_driver = $this->truck_driver_id;
	    $query = "SELECT insertDeliveryDriverTruckCombo('$truck_driver', '$stop', '$store_id');";
	    $stmt = $this->conn->prepare($query);
	    $stmt->execute();
	    
	    return $stmt;
	}

	function insertDeliveryOrders($delivery_id, $store_id){
	    $query = "CALL insertDeliveryOrders('$delivery_id', '$store_id');";
	    $stmt = $this->conn->prepare($query);
	    $stmt->execute();

	    return $stmt;
	}

	function getTomorrowsDeliveryList(){
	    $query = "CALL getTomorrowsDeliveryList();";
	    $stmt = $this->conn->prepare($query);
	    $stmt->execute();

	    return $stmt;
	}

	function getDispatchDeliveries(){
	    $truck_driver = $this->truck_driver_id;
	    $query = "CALL getAssignedDeliveryInformation('$truck_driver');";
	    $stmt = $this->conn->prepare($query);
	    $stmt->execute();

	    return $stmt;
	}

	function deleteRoute(){
	    $truck_driver = $this->truck_driver_id;
	    $query = "CALL deleteRoute('$truck_driver');";
	    $stmt = $this->conn->prepare($query);
	    $stmt->execute();

	    return $stmt;
	}

	
    }
?>
