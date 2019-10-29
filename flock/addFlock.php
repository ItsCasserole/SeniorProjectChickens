<?php
    // Connect to the database
    //Insert new farm.

    if (!include('../connect.php')) {
    die('error finding connect file');
    }

    $dbh = ConnectDB();
if($_POST['farmName'] != "" && $_POST['building'] !="" && $_POST['delivery'] != "" && $_POST['hatchlings'] =! "" && $_POST['breed'] != ""  && $_POST['unit'] != "")
    {
        $farmName = intval($_POST['farmName']);
        $building = intval($_POST['building']);
	$delivery = date($_POST['delivery']);
	$hatchlings = intval($_POST['hatchlings']);
	$breed = $_POST['breed'];
	$unit = $_POST['unit'];
        $sql = "CALL chickens.addFlock('$farmName','$building','$hatchlings','$delivery','$breed','$unit')";
        $stmt = $dbh->prepare($sql);
	$stmt->execute();
	
	echo 'SUCCESS';
    }
    else{
        echo 'TRY AGAIN!';
    }
?>
