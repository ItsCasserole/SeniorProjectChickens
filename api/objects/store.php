<?php
class Store{

    // database connection and table name
    private $conn;
    private $table_name = "Store";

    // object properties
    public $store_id;
    public $store_name;

    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // read farms
    public function read(){
        // call sql procedure to get query
        $query = "SELECT store_id, store_name from Store";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    public function getStores(){
        $sql = "call selectActiveStore();";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt;
    }

}
?>
