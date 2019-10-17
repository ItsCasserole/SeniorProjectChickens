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

    
    $farm_name = $_GET['farm_name'];
    $sql = "SELECT * FROM chickens.Farm WHERE farm_name = '".$farm_name."'";
    
    
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    

    echo "<table>
    <tr>
    <th>ID</th>
    <th>Farm Name</th>
    <th>Address</th>
    <th>City</th>
    </tr>";
    foreach($stmt->fetchAll() as $row){
	    echo "<tr>";
	    echo "<td>" . $row['farm_id'] . "</td>";
	    echo "<td>" . $row['farm_name'] . "</td>"; 
            echo "<td>" . $row['farm_address'] . "</td>"; 
	    echo "<td>" . $row['farm_city'] . "</td>";
	    echo "</tr>";
    }

    echo "</table>";
    


?>
</body>
</html>

