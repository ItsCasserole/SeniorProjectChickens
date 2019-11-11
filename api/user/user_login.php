<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/database.php';
include_once '../objects/user.php';

//instantiate db and connect
$database = new Database();
$db = $database->getConnection();

// initialize user obj
$user = new User($db);

$username = $_POST['username']; 
$password = $_POST['password'];

if( !empty($username) &&
    !empty($password)){
	
    $user->name_string = $username;
    $user->auth_string = $password;

    $stmt = $user->login();
    $result = $stmt->fetch();

    if($result[0] == -1){
	echo json_encode(array(
		"message" => "fail"));
    }
    else{
	$user->user_ID = $result[0];
	$stmt = $user->get_user_info();
	$info = $stmt->fetch();


	echo json_encode(array(
	    "message" => "success",
	    "userid" => $result[0],
	    "permission" => $info['permission_set'],
    	    "firstname" => $info['first_name'],
	    "lastname" => $info['last_name']));
    }

}
else{
    echo json_encode(array(
	    "message" => "incomplete"));
}

?>
