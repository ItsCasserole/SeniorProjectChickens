<?php
class Flock{

    // Connection instance
    private $dbh;
    

    // table name
    private $table_name = "Farm"; //Insert DB table

    // table columns please change once created
    public $id;
    public $name;
    public $address;
    public $building; 
    public $coopCount;
    public $birdsPerCoop;
    public $birdBreed;
    public $price;

    //constructor with $db as database
    public function __construct($dbh){
        
    }
    
    // create farm
    function create(){
 
        // ADD QUERY FUNCTION HERE!!!!
        $query = "";
        
        // prepare query
        $stmt = $this->prepare($query);
 
        // sanitize
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->address=htmlspecialchars(strip_tags($this->address));
        $this->building=htmlspecialchars(strip_tags($this->building));
        $this->coopCount=htmlspecialchars(strip_tags($this->coopCount));
        $this->birdsPerCoop=htmlspecialchars(strip_tags($this->birdsPerCoop));
        $this->birdBreed=htmlspecialchars(strip_tags($this->birdBreed));
        $this->price=htmlspecialchars(strip_tags($this->price));
 
        // bind values
        $stmt->bindParam(":farm", $this->name);
        $stmt->bindParam(":address", $this->address);
        $stmt->bindParam(":building", $this->building);
        $stmt->bindParam(":coops", $this->coopCount);
        $stmt->bindParam(":chickensPerCoop", $this->birdsPerCoop);
        $stmt->bindParam(":type", $this->birdBreed);
        $stmt->bindParam(":unitPrice", $this->price);
 
        // execute query
        if($stmt->execute()){
            return true;
        }
 
        return false;
     
    }
    public function read(){
        // ADD QUERY FUNCTION HERE!!
        $query = "";

        //prepare query statement
        $stmt = $this->prepare($query);

        $stmt->execute();
        return $stmt;
    }
    
    public function update(){
        // UPDATE QUERY HERE!!!!
        $query = "";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // sanitize...Change data titles when db finished
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->address=htmlspecialchars(strip_tags($this->address));
        $this->building=htmlspecialchars(strip_tags($this->building));
        $this->coopCount=htmlspecialchars(strip_tags($this->coopCount));
        $this->birdsPerCoop=htmlspecialchars(strip_tags($this->birdsPerCoop));
        $this->birdBreed=htmlspecialchars(strip_tags($this->birdBreed));
        $this->price=htmlspecialchars(strip_tags($this->price));

        // bind new values ...Change data titles when db finish
        $stmt->bindParam(":farm", $this->name);
        $stmt->bindParam(":address", $this->address);
        $stmt->bindParam(":building", $this->building);
        $stmt->bindParam(":coops", $this->coopCount);
        $stmt->bindParam(":chickensPerCoop", $this->birdsPerCoop);
        $stmt->bindParam(":type", $this->birdBreed);
        $stmt->bindParam(":unitPrice", $this->price);

        // execute the query
        if($stmt->execute()){
            return true;
        }       

        return false;
    }
    // delete the flock
    function delete(){
 
        // delete query
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
 
        // prepare query
        $stmt = $this->prepare($query);
 
        // sanitize
        $this->id=htmlspecialchars(strip_tags($this->id));
 
        // bind id of record to delete
        $stmt->bindParam(1, $this->id);
 
        // execute query
        if($stmt->execute()){
            return true;
        }
 
        return false;
     
    }
    
}
?>
