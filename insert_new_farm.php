
<?php
    // Connect to the database
    //Insert new farm.

    if (!include('../connect.php')) {
    die('error finding connect file');
    }

    $dbh = ConnectDB();


    if(isset($_POST['farm_name']) && isset($_POST['farm_address']) && isset($_POST['farm_city']))
    {
        $farmName = $_POST['farm_name'];
        $farmAddress =$_POST['farm_address'];
        $farmCity = $_POST['farm_city'];
        $sql = "CALL chickens.addFarm('$farmName','$farmAddress','$farmCity')";
        $stmt = $dbh->prepare($sql);
        $stmt-> execute();
        echo 'SUCCESS';
    }
    else{
        echo 'TRY AGAIN!';
    }
?>

