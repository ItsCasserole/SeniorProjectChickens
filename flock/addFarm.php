<?php
    // Connect to the database
    //Insert new farm.

    if (!include('../connect.php')) {
    die('error finding connect file');
    }

    $dbh = ConnectDB();


    if($_POST['farm_name'] != "" && $_POST['farm_city'] != "")
    {
        $farm_name = $_POST['farm_name'];
        $farm_address = $_POST['farm_address'];
        $farm_city = $_POST['farm_city'];
        $sql = "CALL chickens.addFarm('$farm_name','$farm_address','$farm_city')";
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        echo 'SUCCESS: NEW FARM ADDED!';
    }
    else{
        echo 'TRY AGAIN!';
    }
?>
