<?php
session_start();

if (!include('connect.php')) {
  die('error finding connect file');
}

if(!isset($_SESSION["userid"])){
  header("location: login.php");
}

$dbh = ConnectDB();
?>

<?php
  $message  = $_SESSION["firstname"] . ' ' . $_SESSION["last_name"];
  $message .= ' has username ' . $_SESSION["username"];
  $message .= ' and user id ' . $_SESSION["userid"] . '. They have ';
  $message .= $_SESSION["permission"] . ' capabilities.'; 

  echo $message;
?>

<html>
  <a href="logout_logic.php">Logout</a>
</html>
