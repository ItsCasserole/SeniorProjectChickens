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

    public $timestamp;
    public $name_string;


    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }



    // read farms
    public function read(){
        // call sql procedure to get query
	$query = "Select * From Message where date(date_created) = curdate()";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    // create new farm
    public function create(){
        // call sql procedure to add new farm
        $query = "INSERT INTO
        " . $this->table_name . "
    SET
        content=:content";

        $stmt = $this->conn->prepare($query);

        // clean up inputs
        $this->content=htmlspecialchars(strip_tags($this->content));


        // bind values
        $stmt->bindParam(":content", $this->content);

        // execute query
        if($stmt->execute()){
            return true;
        }

        return false;
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
