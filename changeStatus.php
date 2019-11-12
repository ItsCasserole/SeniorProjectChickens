<?php
    // Connect to the database
    //Remove farm_id from $sql once it is set to AI.

    if (!include('connect.php')) {
    die('error finding connect file');
    }

    $dbh = ConnectDB();

    
    if(isset($_POST['truck_id'])) {
        $id = $_POST['truck_id'];


        $sql = "call augmentStatus($id);";
        $stmt = $dbh->prepare($sql);
        $stmt-> execute();
        echo "Status has been changed";
    }
    else{
        echo '{"result":false}';
        $id = 11;


        $sql = "call augmentStatus($id);";
        $stmt = $dbh->prepare($sql);
        $stmt-> execute();
        echo "Status has been changed";
    }
?>