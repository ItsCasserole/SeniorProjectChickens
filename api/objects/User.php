<?php
    class User{
        private $conn;
        private $table = "User";

        //User table attributes
        public $user_ID;
        public $name_string;
        public $first_name;
        public $last_name;
        public $permission_set;
        public $active_status;
        public $auth_string;


        //database connection
        public function __construct($db){
            $this->conn = $db;
        }


        //Get Users
        function read(){

            $sql = "CALL getUserInfo()";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            return $stmt;
        }

        //Get User By ID
        public function readbyID(){

                    $userid = $this->user_ID;
                    $sql = "CALL getUserByID('$userid')";

            // prepare query statement
            $stmt = $this->conn->prepare( $sql );


            // execute query
            $stmt->execute();

            // get retrieved row
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // set values to object properties
            $this->user_ID = $row['user_ID'];
            $this->name_string = $row['name_string'];
            $this->first_name = $row['first_name'];
            $this->last_name = $row['last_name'];
            $this->permission_set = $row['permission_set'];
            $this->active_status = $row['active_status'];
        }

        //create user
        function create(){
	    $firstname = $this->first_name;
	    $lastname = $this->last_name;
	    $username = $this->name_string;
	    $password = $this->name_string;
	    $permission = $this->permission_set;

	    $query  = "CALL createUserProcedure('$firstname', '$lastname', ";
	    $query .= "'$username', '$password', '$permission')";

	    $stmt = $this->conn->prepare($query);
	    $stmt->execute();

	    return $stmt;
	}

       //user login.
       function login(){
	    $username = $this->name_string;
	    $password = $this->auth_string;
	    $query  = "SELECT user_login('$username', '$password')";
	    $stmt = $this->conn->prepare($query);
	    $stmt->execute();
	    return $stmt;
	}

        //get user information
        function get_user_info(){
	    $userid = $this->user_ID;
	    $query  = "SELECT * FROM chickens.User ";
	    $query .= "WHERE user_ID = '$userid'";
	    $stmt = $this->conn->prepare($query);
	    $stmt->execute();
	    return $stmt;
	}



        //filter user
        public function readbystat(){
            $status = $this->active_status;
            if($status == 1){

            $sql = "CALL getActiveUsers()";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            return $stmt;

            }elseif($status ==  2){
             $sql = "CALL getInactiveUsers()";
             $stmt = $this->conn->prepare($sql);
             $stmt->execute();

             return $stmt;

            }elseif($status == 0){

              $sql = "CALL getUserInfo()";
             $stmt = $this->conn->prepare($sql);
             $stmt->execute();

             return $stmt;
            }
        }

        //delete user
        public function delete_user(){
            $userID = $this->user_ID;
            $sql = "CALL deleteUser('$userID')";
            $stmt = $this->conn->prepare($sql);
            if($stmt->execute()){
                return true;
            }
                return false;

        }

        //update user information
	public function update_userinfo(){

            $firstname = $this->first_name;
            $lastname = $this->last_name;
            $username = $this->name_string;
            $permission = $this->permission_set;
            $userid = $this->user_ID;
            $activestat = $this->active_status;

            $sql ="CALL updateUserInfo('$userid','$username','$permission','$firstname','$lastname','$activestat')";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt;
        }
	
	public function changePassword($newPass){
	    $username = $this->name_string;	
	    $pass = $this->auth_string;

	    $query = "SELECT changePassword('$username', '$pass', '$newPass');";
	    $stmt = $this->conn->prepare($query);
	    $stmt->execute();
	    return $stmt;
	}
    }
?>
