<?php
session_start();
if (!include('connect.php')) {
  die('error finding connect file');
}
if(!isset($_SESSION["userid"])){
  header("location:login/login.php");
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

    <title>Simply Fowl | Maintenance</title>

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
    <div id="side">
        <nav id="sidebar" class="fixed maintenance">
            <div class="sidebar-header"><h3 class="text-center">Simply Fowl</h3></div>

            <ul class="list-unstyled components">
                <li><a href="#"><i class="fas fa-home fa-fw"></i> Home</a></li>
                <li><a href="order.php"><i class="fas fa-box-open fa-fw"></i> Orders</a></li>
                <li><a href="#"><i class="fas fa-truck fa-fw"></i> Dispatch</a></li>
                <li><a href="#"><i class="fas fa-briefcase fa-fw"></i> Shipments</a></li>
                <li class="active"><a href="#"><i class="fas fa-wrench fa-fw"></i> Maintenance</a></li>
                <li>
                    <a href="#adminSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fas fa-user-cog fa-fw"></i> Admin</a>
                    <ul class="collapse list-unstyled" id="adminSubmenu">
                        <li><a href="#">View Flock Info</a></li>
                        <li><a href="#">Manage Accounts</a></li>
                    </ul>
                </li>
            </ul>

        </nav>
    </div>


    <!-- Page Content  -->
    <div id="content" >
        <!-- Page Header Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <button type="button" id="sidebarCollapse" class="btn"><i class="fas fa-bars"></i></button>
                <h4 class="nav navbar-nav navbar-center">Maintenance</h4>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">Log Out</a></li>
                </ul>
            </div>
        </nav>

        <!-- Individual Page Content Goes Here -->

        <!-- Add New Customer Card -->
        <div class="card mx-auto">
            <div class="card-body">
                <form>
                    <h3>Add New Customer</h3>
                    <div class="form-group">
                        <label for="inputCustomerName">Customer Name</label>
                        <input type="text" class="form-control" id="inputCustomerName" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Address</label>
                        <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputCity">City</label>
                            <input type="text" class="form-control" id="inputCity" placeholder="City">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputState">State</label>
                            <input type="text" class="form-control" id="inputState" placeholder="State">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputZip">Zip Code</label>
                            <input type="text" class="form-control" id="inputZip" placeholder="Zip Code">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPhone">Phone Number</label>
                        <input type="text" class="form-control" id="inputPhone" placeholder="5554445555">
                    </div>
                    <button type="submit" class="btn btn-primary" onclick="addCustomer()">Add New Customer</button>
                    <button type="reset" class="btn btn-secondary" onclick="resetCustomer()">Cancel</button>
                </form>
            </div>
        </div>

        <br>

        <!-- Add New Truck Card -->
        <div class="card mx-auto">
            <div class="card-body">
                <form>
                    <h3>Add New Truck</h3>
                    <div class="form-group">
                        <label for="inputTruckNumber">Truck Number</label>
                        <input type="text" class="form-control" id="inputTruckNumber" placeholder="Truck Number">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputVIN">VIN</label>
                            <input type="text" class="form-control" id="inputVIN" placeholder="VIN">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputLicensePlate">License Plate</label>
                            <input type="text" class="form-control" id="inputLicensePlate" placeholder="License Plate">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="inputMaxCoops">Maximum Coops</label>
                            <input type="number" class="form-control" id="inputMaxCoops" placeholder="0">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputTransmission">Transmission</label>
                            <select id="inputTransmission" class="form-control">
                                <option selected>Automatic</option>
                                <option>Manual</option>
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary" onclick="addTruck()">Add New Truck</button>
                    <button type="reset" class="btn btn-secondary" onclick="resetTruck()">Cancel</button>
                </form>
            </div>
        </div>

        <br>

        <!-- Current Trucks Card-->
        <div class="card mx-auto">
            <div class="card-body">
                <h3>Current Trucks</h3>
                <div class="container mt-3">
                    <input class="form-control" id="myInput" type="text" placeholder="Search by Truck VIN, or License Plate #">
                    <br>
                    <div class="table-responsive" id="truckTable">
                        <table class="table table-bordered table-hover" >
                            <thead>
                                <tr>
                                    <th>Truck #</th>
                                    <th>VIN</th>
                                    <th>License Plate</th>
                                    <th>Max Coops</th>
                                    <th class="text-center">Status</th>
                                </tr>
                            </thead>
			    <tbody id="myTable">
			    <?php
				$sql = "select * from chickens.Truck;";
$stmt = $dbh->prepare($sql);
				$stmt->execute();
				foreach($stmt->fetchAll() as $row){
					echo '<tr><td>' . $row['truck_number'] . '</td>';
					echo '<td>' . $row['truck_vin'] . '</td>';
					echo '<td>' . $row['truck_plate_number'] . '</td>';
					echo '<td>' . $row['truck_max_coops'] . '</td>';
					echo '<td class="text-center"><div class="btn-group-toggle" data-toggle="buttons">';
					echo '<label class="btn btn-circle btn-sm ';
					if($row['status'] == 1){
						echo 'active">';
					} else {
						echo '">';
					}
					echo '<input type="checkbox" checked autocomplete="off">';
					echo '</label></div></td></tr>';
				}
			    ?>

                            <!-- Dummy table rows, to be replaced with actually Database values -->
                            <!--    <tr>
                                    <td>1</td>
                                    <td>12345678901234567</td>
                                    <td>LICENSE</td>
                                    <td>400</td>
                                    <td class="text-center">
                                        <div class="btn-group-toggle " data-toggle="buttons">
                                            <label class="btn  btn-circle btn-sm active">
                                                <input type="checkbox" checked autocomplete="off">
                                            </label>
                                        </div>
                                    </td>
                                </tr> -->        


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <!-- END OF INDIVIDUAL PAGE CONTENT -->


    </div>
</div>

<!-- Needed for bootstrap -->
<!-- jQuery CDN - Slim version (=without AJAX) -->
<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>


<!-- Collapse/Open Sidebar -->
<script type="text/javascript">
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active')
        });
    });
</script>

<!-- Search Table functionality -->
<script>
    $(document).ready(function(){
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });

    function addCustomer(){
        var customerName = $('#inputCustomerName').val();
        var customerAddress = $('#inputAddress').val();
	var customerPhone = $('#inputPhone').val();
	var customerCity = $('#inputCity').val();
        //alert("New Customer:\n" + "name: " + customerName + "\naddr: " + customerAddress + "\nphone: " + customerPhone);
        //ajax code -Connor A.
        $.ajax({
        type: "post",
        url: "insert_new_customer.php", //php file goes here
        data:{
            customerName : customerName,
            customerAddress : customerAddress,
	    customerPhone : customerPhone,
	    customerCity : customerCity,
        },
        success: function(response){
            alert(response);
        }

    });

        }
    function addTruck(){
        var truckNumber = $('#inputTruckNumber').val();
        var truckVIN = $('#inputVIN').val();
        var truckPlateNumber = $('#inputLicensePlate').val();
        var truckMaxCoops = $('#inputMaxCoops').val();
        var truck_transmission = '';
        if ($('#truckTransmission').val() == "Automatic") {
            truck_transmission = 'Automatic';
        }
        else truck_transmission = 'Manual';
        //ajax code - Connor A
        $.ajax({
        	type: "post",
        	url: "insert_new_truck.php", //php file goes here
        	data:{
            		truckNumber : truckNumber,
            		truckVIN : truckVIN,
            		truckPlateNumber : truckPlateNumber,
            	truckMaxCoops : truckMaxCoops
        	},
        	success: function(response){
            		alert(response);
		}
	});
	alert("The new truck has been added!");
	window.location.reload();
    }

    function resetTruck(){
        document.getElementById('inputTruckNumber').value = '';
	document.getElementById('inputVIN').value = '';
	document.getElementById('inputLicensePlate').value = '';
	document.getElementById('inputMaxCoops').value = 0;
    }

    function resetCustomer(){
	document.getElementById('inputCustomerName').value = '';
	document.getElementById('inputAddress').value = '';
	document.getElementById('inputCity').value = '';
	document.getElementById('inputState').value = '';
	document.getElementById('inputZip').value = '';
	document.getElementById('inputPhone').value = '';
    }
</script>



</body>

</html>

