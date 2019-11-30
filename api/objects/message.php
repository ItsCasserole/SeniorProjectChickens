<?php
class Message{

    // database connection and table name
    private $conn;
    private $table_name = "Message";

    // object properties
    public $message_id;
    public $user_ID;
    public $content;
    public $timestamp;
    public $flockmanager_flag;
    public $salesmanager_flag;
    public $truckdriver_flag;


    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // read farms
    public function read(){
        // call sql procedure to get query
        $query = "Select * From Message";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    // create new farm
    public function create(){
        // call sql procedure to add new farm
        // call sql procedure to add new farm
        $content = $this->content;
		$flockmanager_flag = $this->flockmanager_flag;
        $salesmanager_flag = $this->salesmanager_flag;
		$truckdriver_flag = $this->truckdriver_flag;
        $sql = "INSERT INTO chickens.Message(content,flockmanager_flag,salesmanager_flag,truckdriver_flag, date_created) VALUES ('$content','$flockmanager_flag','$salesmanager_flag', '$truckdriver_flag', CURDATE());";
        $stmt = $this->conn->prepare($sql);
        $stmt-> execute();
        echo "New Message has been added to the Database";
        // execute query

    }

    //read messages for truck driver
    public function readfortruckdriver(){

     $sql = "CALL getmessagesforTD()";
     $stmt = $this->conn->prepare($sql);
     if($stmt->execute()){
            return true;
        }

        return false;


    }
    
        //read messages for sales driver
    public function readforsalesmanager(){

     $sql = 'select concat(u.first_name, " ", u.last_name) as name, m.content, m.date_created from Message m  left join User u using (user_id) where salesmanager_flag = 1 and m.date_created = curdate();';
     $stmt = $this->conn->prepare($sql);
     $stmt->execute();
     return $stmt;

    }


}
?>
