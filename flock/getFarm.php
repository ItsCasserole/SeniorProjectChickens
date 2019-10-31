<?php
    // Connect to the database
    //Remove farm_id from $sql once it is set to AI.

    if (!include('../connect.php')) {
    die('error finding connect file');
    }

    $dbh = ConnectDB();

    $farm_id = intval($_GET['farm_id']);
    $sql = "SELECT * FROM chickens.Farm WHERE farm_id = '".$farm_id."'";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
?>
