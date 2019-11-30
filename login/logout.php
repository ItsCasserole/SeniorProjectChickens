<?php
session_start();

if (!include('connect.php')) {
  die('error finding connect file');
}

if(isset($_SESSION["userid"])){
  session_destroy();
}

header("location: login.php");
?>

