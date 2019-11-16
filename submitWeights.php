<?php
   // Connect to the database

   if (!include('connect.php')) {
      die('error finding connect file');
   }

   $dbh = ConnectDB();

        $flockID = $_POST['flock_id'];
        $w1 = $_POST['weight_1'];
        $w2 = $_POST['weight_2'];
        $coops = $_POST['num_coops'];
        $trailer = $_POST['trailer_num'];
        $delvDate = $_POST['delviery_date'];

       $sql = "CALL recordIncomingWeight('$flockID','$w1','$w2','$coops','$trailer','$delvDate');";
       echo 'After sql set';
       $stmt = $dbh->prepare($sql);
       $stmt-> execute();
       echo 'SUCCESS';


?>
