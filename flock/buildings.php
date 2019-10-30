<?php
    if(!include('connect.php')){
        die("Error finding connect.php");
    }

    $dbh = ConnectDB();


    $sql = "SELECT * FROM chickens.Building";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
?>
