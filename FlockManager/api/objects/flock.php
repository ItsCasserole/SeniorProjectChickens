<?php
class Flock{

    // database connection and table name
    private $conn;
    private $table_name = "Flock";

    // object properties
    public $flock_id;
    public $farm_id;
    public $building_id;
    public $bird_type_id;
    public $delivery_date;
    public $hatchlings;
    

    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    // read flocks
    function read(){
        //call sql procedure to get query
        $query = "CALL getFlock()";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    // create new flock
    function create(){
        // call sql procedure to add new flock
        $query = "INSERT INTO
        " . $this->table_name . "
    SET
        farm_id=:farm_id, building_id=:building_id, hatchlings=:hatchlings, delivery_date=:delivery_date,
        bird_desc=:bird_desc, unit_sold=:unit_sold";
        $stmt = $this->conn->prepare($query);
        
        // clean up inputs
        $this->farm_id=htmlspecialchars(strip_tags($this->farm_id));
        $this->building_id=htmlspecialchars(strip_tags($this->building_id));
        $this->hatchlings=htmlspecialchars(strip_tags($this->hatchlings));
        $this->delivery_date=htmlspecialchars(strip_tags($this->delivery_date));
        $this->bird_desc=htmlspecialchars(strip_tags($this->bird_desc));
        $this->unit_sold=htmlspecialchars(strip_tags($this->unit_sold));

        // bind values
        $stmt->bindParam(":farm_id", $this->farm_id);
        $stmt->bindParam(":building_id", $this->building_id);
        $stmt->bindParam(":hatchlings", $this->hatchlings);
        $stmt->bindParam(":delivery_date", $this->delivery_date);
        $stmt->bindParam(":bird_desc", $this->farm_bird_desc);
        $stmt->bindParam(":unit_sold", $this->unit_sold);

        // execute query
        if($stmt->execute()){
            return true;
        }
        
        return false;
    }
}
?>