<?php

ConnectDB();

// ConnectDB() - takes no arguments, returns database handle
// USAGE: $dbh = ConnectDB();
function ConnectDB() {

   /*** mysql server info ***/
    $hostname = '';  // Local host, i.e. running on elvis
    $username = '';           // Your MySQL Username goes here
    $password = '';           // Your MySQL Password goes here
    $dbname   = '';           // For elvis, your MySQL Username is repeated here

   try {
       $dbh = new PDO("mysql:host=$hostname;dbname=$dbname",
                      $username, $password);
    }
    catch(PDOException $e) {
        die ('PDO error in "ConnectDB()": ' . $e->getMessage() );
    }

    return $dbh; 
}

?>
