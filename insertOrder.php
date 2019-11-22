<?php
    // Connect to the database
    //Remove farm_id from $sql once it is set to AI.
    if (!include('connect.php')) {
    die('error finding connect file');
    }
    $dbh = ConnectDB();
    
    if(isset($_POST['storeid']) && isset($_POST['deldate']) && isset($_POST['numcoops']) && isset($_POST['flockid'])) {
        $storeid = $_POST['storeid'];
        $deldate = $_POST['deldate'];
        $numcoops = $_POST['numcoops'];
        $flockid = $_POST['flockid'];
        $sql = "call addOrder(" . $numcoops . ', "' . $deldate . '", ' . $storeid . ", " . $flockid . ");";
	$stmt = $dbh->prepare($sql);
	//$stmt->bindParam('isii', $numcoops, $deldate, $storeid, $flockid);
	$stmt->execute();
    }
    else {
	echo "After youve scrubbed all the floors in hyrule THEN we can talk about mercy";
    }
?>
