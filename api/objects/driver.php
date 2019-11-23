<?php
    class Driver{
	private $conn;

	public $driver_id;
	public $first_name;
	public $last_name;
	public $phone_number;
	public $date_of_birth;
	public $license_st;
	public $license_number;
	public $license_type;
	public $license_expiration;
	public $medical_expiration;
	public $transmission_type;

	public function __construct($db){
	    $this->conn = $db;
	}

	function read(){
	    $query = "SELECT * FROM chickens.Driver ORDER BY last_name";
	    $stmt = $this->conn->prepare($query);
	    $stmt->execute();

	    return $stmt;
	}
    }
?>
