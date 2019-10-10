<?php
	// Content Type JSON
	header("Content-type: application/json");
	
	include_once 'connect.php';
	$conn = ConnectDB();
	
	$res = array('error' => false);
	// Read data from database
	$action = 'read';
	if (isset($_GET['action'])) {
		$action = $_GET['action'];
	}
	if ($action == 'read') {
		$result = $conn->query("SELECT * FROM `Farm`");
		$users  = array();
		while ($row = $result->fetch_assoc()) {
			array_push($farms, $row);
		}
		$res['Farm'] = $farms;
	}
	// Insert data into database
	if ($action == 'create') {
		$farmName = $_POST['farm_name'];
		$address  = $_POST['farm_address'];
		$city     = $_POST['farm_city'];
		$result   = $conn->query("INSERT INTO `Farm` (`farm_name`, `farm_address`, `farm_city`) VALUES('$farmName', '$address', '$city')");
		if ($result) {
			$res['message'] = "Farm added successfully";
		} else {
			$res['error']   = true;
			$res['message'] = "Farm insert failed!";
		}
	}
	// Update data
	if ($action == 'update') {
		$id       = $_POST['farm_id'];
		$farmName = $_POST['farm_name'];
		$address    = $_POST['farm_address'];
		$city   = $_POST['farm_city'];
		$result = $conn->query("UPDATE `Farm` SET `farm_name`='$farmName', `farm_address`='$address', `farm_city`='$city' WHERE `id`='$id'");
		if ($result) {
			$res['message'] = "Farm updated successfully";
		} else {
			$res['error']   = true;
			$res['message'] = "farm update failed!";
 		}
	}
	// Delete data
	if ($action == 'delete') {
		$id       = $_POST['farm_id'];
		$farmName = $_POST['farm_name'];
		$address  = $_POST['farm_address'];
		$city     = $_POST['farm_city'];
		$result   = $conn->query("DELETE FROM `Farm` WHERE `id`='$id'");
		if ($result) {
			$res['message'] = "Farm delete success";
		} else {
			$res['error']   = true;
			$res['message'] = "Farm delete failed!";
		}
	}
	// Close database connection
	$conn->close();
	// print json encoded data
	echo json_encode($res);
	die();
?>