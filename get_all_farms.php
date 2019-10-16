<?php
    if(!include('connect.php')){
        die("Error finding connect.php");
    }

    $dbh = ConnectDB();

    $sql = "CALL getFarm();";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();

    foreach ($stmt->fetchAll() as $row){
        echo '<option value="' . $row['farm_id'] . '">' . $row['farm_name'] . '</option>\n';
    }
?>
