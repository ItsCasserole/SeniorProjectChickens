<<<<<<< HEAD

=======
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

	function getTomorrowsAvailableTrucks(){
	    $trans = $this->truck_transmission;
	    $query = "CALL getTomorrowsAvailableTrucks('$trans');";
	    $stmt = $this->conn->prepare($query);
	    $stmt->execute();

	    return $stmt;
	}

	function getTransmissionType(){
	    $id = $this->truck_id;
	    $query = "SELECT truck_transmition FROM chickens.Truck WHERE truck_id = '$id';";
	    $stmt = $this->conn->prepare($query);
	    $stmt->execute();

	    return $stmt;
	}

	function getMaxCoops(){
	    $id = $this->truck_id;
	    $query = "SELECT truck_max_coops FROM chickens.Truck WHERE truck_id = '$id';";
	    $stmt = $this->conn->prepare($query);
	    $stmt->execute();

	    return $stmt;
	}
    }
?>
>>>>>>> 
