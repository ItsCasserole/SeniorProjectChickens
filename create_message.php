<?php
    if (!include('connect.php')) {
    die('error finding connect file');
    }

    $dbh = ConnectDB();

    // database connection and table name

    // object properties

             if(isset($_POST['content'])){
            $content = $_POST['content'];
            $flockmanager_flag= $_POST['flockmanager_flag'];
            $salesmanager_flag =$_POST['salesmanager_flag'];
            $truckdriver_flag = $_POST['truckdriver_flag'];


        // call sql procedure to add new farm
        $sql = "INSERT INTO chickens.Message(content,flockmanager_flag,salesmanager_flag,truckdriver_flag, date_created) VALUES ('$content','$flockmanager_flag','$salesmanager_flag', '$truckdriver_flag', CURDATE())";
        $stmt = $dbh->prepare($sql);
        $stmt-> execute();
        echo "New Message has been added to the Database";
             }
             else{
                echo '{"result":false}';
             }
        
    ?>