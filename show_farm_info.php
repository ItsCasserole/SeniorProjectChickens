<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
    // Connect to the database
    //Remove farm_id from $sql once it is set to AI.

    if (!include('../connect.php')) {
    die('error finding connect file');
    }

    $dbh = ConnectDB();


    $farmName = $_GET['farm_name'];

    
    $sql = "SELECT * FROM 'chickens.Farm' WHERE 'farm_name' = '".$farmName."'";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    
    echo "<table>
    <tr>
    <th>FarmName</th>
    <th>Address</th>
    <th>City</th>
    </tr>";
    while($row = $stmt->fetchAll()){
	    echo "<tr>";
	    echo "<td>" . $row["farm_name"] . "</td>"; 
            echo "<td>" . $row["farm_address"] . "</td>"; 
	    echo "<td>" . $row["farm_city"] . "</td>";
	    echo"</tr>";
    }

    echo "</table>";
    


?>
