<?php
class Flock{

    // Connection instance
    private $dbh;

    // table name
    private $table_name = ""; //Insert DB table

    // table columns please change once created
    public $id;
    public $reference;
    public $description;
    public $createdAt; 
    public $updatedAt;

    //constructor with $db as database
    public function __construct($dbh){
        $this->connection = $dbh;
    }
    
    public function read(){
        // ADD QUERY FUNCTION HERE!!
        $query = "";

        //prepare query statement
        $stmt = $this->conn->prepare($query);

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
        $this->price=htmlspecialchars(strip_tags($this->price));
        $this->description=htmlspecialchars(strip_tags($this->description));
        $this->category_id=htmlspecialchars(strip_tags($this->category_id));
        $this->id=htmlspecialchars(strip_tags($this->id));

        // bind new values ...Change data titles when db finish
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':price', $this->price);
        $stmt->bindParam(':description', $this->description);
        $stmt->bindParam(':category_id', $this->category_id);
        $stmt->bindParam(':id', $this->id);

        // execute the query
        if($stmt->execute()){
            return true;
        }       

        return false;
    }
    
}
?>
