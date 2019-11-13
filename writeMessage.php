<?php
//Connect to the database
	if(!include('connect.php')) {
		die('error finding connect file');
	}
	$dbh = ConnectDB();

if (isset($_POST['announcementTextarea'])) {
    $sql = "USE chickens; ";
                                $sql = "Insert  Into chickens.Message(user_ID, content, timestamp) values (13, " . $_POST['announcementTextarea'] . ", now());";
                                echo $sql;
                                $stmt = $dbh->prepare($sql);
                                $stmt->execute();
} else {
	echo 'After youve scrubbed all the floors in Hyrule then we can talk about mercy';
}

?>
