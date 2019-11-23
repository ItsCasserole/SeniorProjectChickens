<?php
    class Truck{
	private $conn;

	public $truck_id;
	public $truck_status;
	public $truck_vin;
	public $truck_plate_number;
	public $truck_max_coops;
	public $truck_transmission;
	public $truck_number;
	public $box_type;

	public function __construct($db){
	    $this->conn = $db;
	}

	function read(){
	    $query = "SELECT * FROM chickens.Truck";
	    $stmt = $this->conn->prepare($query);
	    $stmt->execute();

	    return $stmt;
	}
    }
?>
