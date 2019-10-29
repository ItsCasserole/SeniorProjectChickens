<?php
    // Connect to the database
    //Remove farm_id from $sql once it is set to AI.

    if (!include('../connect.php')) {
    die('error finding connect file');
    }

    $dbh = ConnectDB();

   
    $sql = "CALL chickens.getFlock()";   		
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));

    
?>
