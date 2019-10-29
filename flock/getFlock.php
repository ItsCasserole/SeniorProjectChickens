<?php
    // Connect to the database
    //Remove farm_id from $sql once it is set to AI.

    if (!include('../connect.php')) {
    die('error finding connect file');
    }

    $dbh = ConnectDB();

    $farm_id = intval($_GET['farm_id']);
    $sql = "select f.farm_name, 
	    b.building_number,b.building_floor, 
            bt.bird_desc,bt.unit_sold,fl.delivery_date,fl.hatchlings
            from Flock fl
	    join Farm f using (farm_id)
            join Building b using (building_id)
            join Bird_type bt using (bird_type_id)
            where f.farm_id='".$farm_id."'";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));

?>
