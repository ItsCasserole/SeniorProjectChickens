<?php
    // Connect to the database
    //Remove farm_id from $sql once it is set to AI.
    if (!include('connect.php')) {
    die('error finding connect file');
    }
    $dbh = ConnectDB();
    
    if(isset($_POST['customerName']) && isset($_POST['customerAddress']) && isset($_POST['customerPhone'])) {
        $customerName = $_POST['customerName'];
        $customerAddress =$_POST['customerAddress'];
	$customerPhone = $_POST['customerPhone'];
	$customerCity = $_POST['customerCity'];
        $sql = "INSERT INTO chickens.Store(store_name,store_phone,store_address,store_city) VALUES ('$customerName','$customerPhone','$customerAddress','$customerCity')";
        $stmt = $dbh->prepare($sql);
        $stmt-> execute();
        echo "New Customer has been added to the Database with name: $customerName";
    }
    else{
        echo '{"result":false}';
    }
?>
