<?php
class Orders{

    // Connection instance
    private $connection;

    // table name
    private $table_name = "Orders";

    // table columns
    public $id;
    public $reference;
    public $description;
    public $createdAt; 
    public $updatedAt;

    public function __construct($connection){
        $this->connection = $connection;
    }
    //C
    public function create(){}
    //R
    public function read(){}
    //U
    public function update(){}
    //D
    public function delete(){}    
}