<?php
    // Connect to the database
    //Remove farm_id from $sql once it is set to AI.
    if (!include('connect.php')) {
    die('error finding connect file');
    }
    $dbh = ConnectDB();
    
    if(isset($_POST['truckNumber']) && isset($_POST['truckVIN']) && isset($_POST['truckPlateNumber']) && isset($_POST['truckMaxCoops'])) {
        $truckNumber = $_POST['truckNumber'];
        $truckVIN = $_POST['truckVIN'];
        $truckPlateNumber = $_POST['truckPlateNumber'];
        $truckMaxCoops = $_POST['truckMaxCoops'];
        $sql = "INSERT INTO chickens.Truck(truck_number,truck_vin,truck_plate_number, truck_max_coops) VALUES ('$truckNumber','$truckVIN','$truckPlateNumber','$truckMaxCoops')";
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        //echo "New Truck has been added to the Database with Number: $truckNumber";
        /*if (!($stmt->execute())){
            echo $stmt->error;
        }
        
        /*
        if ($stmt-> execute()){
        echo "New Truck has been added to the Database with Number: $truckNumber";
        }
        else {
            echo "Adding New Truck has failed";
        }*/
    }
    else{
        echo '{"result":false}';
    }
?>
