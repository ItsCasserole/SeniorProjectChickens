<?php
	//Connect to the database
	if(!include('connect.php')) {
		die('error finding connect file');
	}
	$dbh = ConnectDB();

	if(isset($_POST['id'])) {
		$id = $_POST['id'];
		$sql = "call removeOrder(" . $id . ");";
		$stmt = $dbh->prepare($sql);
		//$stmt->bindParam('i', $id);
		$stmt->execute();
		echo $sql;
	}
	else {
		echo "After you've scrubbed all the floors in Hyrule THEN we can talk about mercy, take them away!";
	}
?>
