<?php
class Message{

    // database connection and table name
    private $conn;
    private $table_name = "Message";

    // object properties
    public $message_id;
    public $user_id;
    public $content;
    public $date_created;

    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }


    //read messages for truck driver
    public function readfortruckdriver(){

     $sql = "CALL getmessagesforTD()";
     $stmt = $this->conn->prepare($sql);
     $stmt->execute();
     return $stmt;

    }

}
?>
