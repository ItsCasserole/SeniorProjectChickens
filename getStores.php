<?php
	if(!include('../connect.php')){
		die("Error finding connect.php");
	}

	$dbh = ConnectDB();

	$sql = "call selectActiveStore();"
	$stmt = $dbh->prepare($sql);
	$stmt->execute();
	echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
?>
