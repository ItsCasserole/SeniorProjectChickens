<?php
class Truck{

    // database connection and table name
    private $conn;
    private $table_name = "Truck";

    // object properties
    public $truck_status;
    public $truck_vin;
    public $truck_plate_number;
    public $truck_transmition;
    public $truck_number;
    public $truck_max_coops;

    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // read farms
    public function read(){
        // call sql procedure to get query
        $query = "Select * From Truck;";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    // create new farm
    public function create(){
        // call sql procedure to add new farm
        $truck_number = $this->truck_number;
		$truck_vin = $this->truck_vin;
        $truck_plate_number = $this->truck_plate_number;
        $truck_max_coops = $this->truck_max_coops ;
        $sql = "INSERT INTO chickens.Truck(truck_number,truck_vin,truck_plate_number, truck_max_coops) VALUES ('$truck_number','$truck_vin','$truck_plate_number','$truck_max_coops');";
        $stmt = $this->conn->prepare($sql);
        $stmt-> execute();
}
}

?>