<?php
session_start();

if (!include('connect.php')) {
  die('error finding connect file');
}

if(!isset($_SESSION["userid"])){
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

        <!-- Sidebar  -->
        <div>
            <nav id="sidebar" class="fixed">
                <div class="sidebar-header"><h3 class="text-center">Simply Fowl</h3></div>

                <ul class="list-unstyled components">
                    <li><a href="#"><i class="fas fa-home fa-fw"></i> Home</a></li>
                    <li class="active"><a href="#"><i class="fas fa-box-open fa-fw"></i> Orders</a></li>
                    <li><a href="#"><i class="fas fa-truck fa-fw"></i> Dispatch</a></li>
                    <li><a href="#"><i class="fas fa-briefcase fa-fw"></i> Shipments</a></li>
                    <li><a href="#"><i class="fas fa-wrench fa-fw"></i> Maintenance</a></li>
                    <li>
                        <a href="#adminSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <i class="fas fa-user-cog fa-fw"></i> Admin</a>
                        <ul class="collapse list-unstyled" id="adminSubmenu">
                            <li><a href="#">View Flock Info</a></li>
                            <li><a href="#">Manage Accounts</a></li>
                        </ul>
                    </li>
                    <li><a href="#"><i class="fas fa-tractor fa-fw"></i> Flock Manager</a></li>
                    <li><a href="#"><i class="fas fa-truck fa-fw"></i> Truck Driver</a></li>
                </ul>

            </nav>
        </div>


        <!-- Page Content  -->
        <div id="content" >
            <!-- Page Header Navbar -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn"><i class="fas fa-bars"></i></button>
                    <h4 class="nav navbar-nav navbar-center">Shipments</h4>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#">Log Out</a></li>
                    </ul>
                </div>
            </nav>

            <!-- Individual Page Content Goes Here -->

            <div class="card mx-auto">
                <div class="card-body">
                    <form>
                        <h3><center>Incoming Weights</center></h3>
                        <div id="form-data">
                            <p><label for="delvDate">Delivery Date:</label>
                            <input type="text" class="date" id="delvDate" /></p>
                            <select class="trailerWeight"></select>
                            <input type="text" class="numbers" id="weight1" placeholder="Weight 1" size="4" />
                            <input type="text" class="numbers" id="weight2" placeholder="Weight 2" size="4" />
                            <input type="text" class="numbers" id="numCoops" placeholder="# of Coops" size="4" />
                            <input type="text" class="numbers" id="trailer" placeholder="Trailer #" size="4" />
                            <button id="submit" class="btn-weight" type="button" onclick="submitWeight()">Submit</button>

                        </div>

                    </form>

                </div>
            </div>

            <div class="card mx-auto">
                <div class="card-body">
                    <form>
                        <h3><center>Tonight's Weights</center></h3>
                        <table class="table table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="text-center">Farm</th>
                                    <th scope="col" class="text-center">Bird</th>
                                    <th scope="col" class="text-center">Weight</th>
                                </tr>
                            </thead>

                            
                        </table>
                    </form>
                </div>
            </div>


                <!-- END OF INDIVIDUAL PAGE CONTENT -->


        </div>
        
    </div>

    <!-- Needed for bootstrap -->
    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>


    <!-- Collapse/Open Sidebar -->
    <script type="text/javascript">

        $(".numbers").on("keypress keyup blur", function(event) {
        $(this).val($(this).val().replace(/[^\d].+/, ""));
        if ((event.which < 48 || event.which > 57)) {
            event.preventDefault();
        }
        });

        $(".trailerweight").on("change",function(){
		alery( ("select#farm_name option:checked").val() );
		});


    </script>

</body>

</html>