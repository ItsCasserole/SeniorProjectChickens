<?php
session_start();

if (!include('connect.php')){
    die('Error finding connect file!');
}

if (!isset($_SESSION["userid"])){
    header("location: login/login.php");
}

$dbh = ConnectDB();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <script type ='text/javascript' src='main.js'></script>
        <!-- Latest compiled minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <!-- Our custom CSS -->
        <link rel="stylesheet" href="style.css">
        <!-- Font Awesome JS -->
        <script src="https://kit.fontawesome.com/412b07d0f6.js" crossorigin="anonymous"></script>

        <title>Simply Fowl | Shipments</title>
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <div>
            <nav id="sidebar" class="fixed">
                <div class="sidebar-header"><h3 class="text-center">Simply Fowl</h3></div>
                <ul class="list-unstyled componenets">
                    <li><a href="#"><i class="fas fa-hom fa-fw"></i> Home</a></li>
                    <li><a href="#"><i class="fas fa-box-open fa-fw"></i> Orders</a></li>
                    <li><a href="#"><i class="fas fa-truck fa-fw"></i> Dispatch</a></li>
                    <li class="active"><a href="#"><i class="fas fa-briefcase fa-fw"></i> Shipments</a></li>
