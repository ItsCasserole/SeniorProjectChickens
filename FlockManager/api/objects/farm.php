<?php
class Farm{

    // database connection and table name
    private $conn;
    private $table_name = "Farm";

    // object properties
    public $farm_id;
    public $farm_name;
    public $farm_address;
    public $farm_city;

    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // read farms
    function read(){
        // call sql procedure to get query
        $query = "CALL getFarm()";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    // create new farm
    function create(){
        // call sql procedure to add new farm
        $query = "INSERT INTO
        " . $this->table_name . "
    SET
        farm_name=:farm_name, farm_address=:farm_address, farm_city=:farm_city";
        
        $stmt = $this->conn->prepare($query);
        
        // clean up inputs
        $this->farm_name=htmlspecialchars(strip_tags($this->farm_name));
        $this->farm_address=htmlspecialchars(strip_tags($this->farm_address));
        $this->farm_city=htmlspecialchars(strip_tags($this->farm_city));

        // bind values
        $stmt->bindParam(":farm_name", $this->farm_name);
        $stmt->bindParam(":farm_address", $this->farm_address);
        $stmt->bindParam(":farm_city", $this->farm_city);

        // execute query
        if($stmt->execute()){
            return true;
        }
        
        return false;
    }
}
?>