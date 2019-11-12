<?php
   // Connect to the database

   if (!include('connect.php')) {
      die('error finding connect file');
   }

   $dbh = ConnectDB();

   $sql = "CALL getFlock()";
   $stmt = $dbh->prepare($sql);
   $stmt->execute();
   echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
?>
