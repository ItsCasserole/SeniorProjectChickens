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
        <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
        <script type='text/javascript' src='main.js'></script>

        <title>Simply Fowl | Shipments</title>

        <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="style.css">

        <!-- Font Awesome JS -->
        <script src="https://kit.fontawesome.com/412b07d0f6.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <div id="sidebar-menu">
            <nav id="sidebar" class="fixed">
                <div class="sidebar-header"><h3 class="text-center">Simply Fowl</h3></div>
                <ul class="list-unstyled componenets">
                    <li><a href="#"><i class="fas fa-hom fa-fw"></i> Home</a></li>
                    <li><a href="#"><i class="fas fa-box-open fa-fw"></i> Orders</a></li>
                    <li><a href="#"><i class="fas fa-truck fa-fw"></i> Dispatch</a></li>
                    <li class="active"><a href="#"><i class="fas fa-briefcase fa-fw"></i> Shipments</a></li>
                    <li><a href="#"><i class="fas fa-wrench fa-fw"></i> Maintenance</a></li>
                    <li><a href="#adminSubMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fas fa-user-cog fa-fw"></i> Admin</a>
                        <ul class="collapse list-unstyled" id="adminSubMenu">
                            <li><a href="#">View Flock Info</a></li>
                            <li><a href="#">Manager Accounts</a></li>
                        </ul></li>
                    <li><a href="#"><i class="fas fa-tractor fa-fw"></i> Flock Manager</a></li>
                    <li><a href="#"><i class="fas fa-truck fa-fw"></i> Truck Driver</a></li></ul></nav></div>

        <!-- Main Page Content -->

        <div id="content">
            <!-- Main Page Header -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn"><i class="fas fa-bars"></i></button>
                    <h4 class="nav navbar-nav navbar-center">Shipments</h4>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#">Log Out</a></li></ul></div></nav>
            
            <!-- Individual Page Content Goes Here -->
            
            <div class="card mx-auto">
                <div class="card-body">
                    <form id="weightForm" class="was-validated">
                        <h3 class="text-center">Incoming Weights</h3>
                        <div class="form-group">
                            <label for="delvDate">Delivery Date: </label>
                            <input type="text" class="date" id="delvDate" placeholder="MM/DD/YY" name="delvDate" size="10" required />
                            <div class="invalid-feedback">Please Enter Delivery Date</div></div>
                        <div class="form-group">
                            <select class="trailerWeight" id="trailerWeight" required></select>
                            <div class="invalid-feedback">Please Select a Flock</div>
                            <input type="text" class="numbers" id="weight1" placeholder="Weight #1" size="4" required />
                            <div class="invalid-feedback">Please Enter Weight</div>
                            <input type="text" class="numbers" id="weight2" placeholder="Weigth #2" size="4" />
                            <input type="text" class="numbers" id="numCoops" placeholder="# of Coops" size="4" required />
                            <div class="invalid-feedback">Please Enter # of Coops</div>
                            <input type="text" class="numbers" id="trailer" placeholder="Trailer #" size="4" required />
                            <div class="invalid-feedback">Please Enter Trailer #</div>
                            <button id="submit" class="btn btn-primary" type="submit" onclick="submitWeight()">Submit</button>


                        </div>
                    </form>
                </div>
                
                   

                    
            </div></div></div>

    <!-- Needed for bootstrap -->
    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" ></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>


    <!-- Collapse/Open Sidebar -->
    <script type="text/javascript">

        $(document).ready(function(){
                $('#sidebarCollapse').on('click', function() {
                        $('#sidebar').toggleClass('active');
                });

            $.ajax({
                type: "GET",
                url: "getFlocks.php",
                data: {},
                success: function(response){
                    $('.trailerWeight').empty();
                                $('.trailerWeight').append('<option value="" id="farm_name">Please Select Flock</option>');
                    var data = JSON.parse(response);
                    for (var i = 0; i < data.length; i++) {
                        $('.trailerWeight').append('<option value="' + data[i].flock_id + '" id="farm_name">' + data[i].farm_name + " - " + data[i].bird_desc + '</option>');
                    }
                        },
            });

            
        });

        $(".numbers").on("keypress keyup blur", function(event) {
        $(this).val($(this).val().replace(/[^\d].+/, ""));
        if ((event.which < 48 || event.which > 57)) {
            event.preventDefault();
        }
        });

        function addWeight(flock_ID, weight_1, weight_2, num_coops, trailer_num, delivery_date) {

        if (flock_ID !=='undefined' || weight_1 !=='undefined' || num_coops !== 'undefined' || trailer_num !== 'undefined' || delivery_date !== 'undefined'){

                $.ajax({
                        type: "POST",
                        url: "submitWeights.php",
                        data:{
                        flock_ID : flock_ID,
                        weight_1 : weight_1,
                        weight_2 : weight_2,
                        num_coops : num_coops,
                        trailer_num : trailer_num,
                        delivery_date : delivery_date,
                        },
                        success: function(response){
                        alert(response);
                        alert('addweight if main js');
                        }
                });
        } else {
                        alert('Please ensure a Bird is selected, the first weight is entered, the number of coops is enterd, and the trailer number is enterer.');
                }
        }   

        function submitWeight(){
            if ($('#weight2').val() === null){
                addWeight($('#trailerWeight').val(), $('#weight1').val(), 0, $('#numCoops').val(), $('#trailer').val(), $('#delvDate').val());
            }
            else {
                addWeight($('#trailerWeight').val(), $('#weight1').val(), $('#weight2').val(), $('#numCoops').val(), $('#trailer').val(), $('#delvDate').val());
            }

        }
        


    </script>
</body>
</html>