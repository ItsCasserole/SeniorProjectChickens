<?php
session_start();
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
    <script type='text/javascript' src='main.js'></script>

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
                <li><a href="#"><i class="fas fa-box-open fa-fw"></i> Orders</a></li>
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
                <p id="text" style="display:none">Checkbox is CHECKED!</p>
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
                        <input type="text" class="form-control" id="inputPhone" placeholder="555 555 5555">
                    </div>
                    <button type="submit" class="btn btn-primary" onclick="addCustomer()">Add New Customer</button>
                    <button type="reset" class="btn btn-secondary">Cancel</button>
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
                        <input type="text" class="form-control" id="truckNumber" placeholder="Truck Number">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputVIN">VIN</label>
                            <input type="text" class="form-control" id="truckVIN" placeholder="VIN">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputLicensePlate">License Plate</label>
                            <input type="text" class="form-control" id="truckPlateNumber" placeholder="License Plate">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="inputMaxCoops">Maximum Coops</label>
                            <input type="number" class="form-control" id="truckMaxCoops" placeholder="0">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputTransmission">Transmission</label>
                            <select id="truckTransmission" class="form-control">
                                <option selected>Automatic</option>
                                <option>Manual</option>
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary" onclick="addTruck()">Add New Truck</button>
                    <button type="reset" class="btn btn-secondary">Cancel</button>
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
                            <!-- Dummy table rows, to be replaced with actually Database values -->
                                <tr>
                                    <td>1</td>
                                    <td>12345678901234567</td>
                                    <td>LICENSE</td>
                                    <td>400</td>
                                    <td class="text-center">
                                        <div class="btn-group-toggle " data-toggle="buttons">
                                          <label class="btn  btn-circle btn-sm active ">
                                                <input id = "myCheck" type="checkbox"  onclick="changeStatus(11);"/>
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                
                                <?php
                                $sql = "USE chickens; ";
                                $sql = "select truck_id,truck_number, truck_vin, truck_plate_number,truck_max_coops, truck_status ";
                                $sql .= "FROM chickens.Truck;";
                                echo $sql;
                                $stmt = $dbh->prepare($sql);
                                $stmt->execute();
                                foreach ($stmt->fetchAll() as $rows) {
                                  if ($rows['truck_status'] == 1)
                                    $state = 'active';
                                  else
                                    $state = '';
                                  
                                  echo '<tr>';
                                  echo "<td>". $rows['truck_number'] . "</td>";
                                  echo  "<td>".$rows['truck_vin']."</td>";
                                  echo  "<td>".$rows['truck_plate_number']."</td>";
                                  echo  "<td>".$rows['truck_max_coops']."</td>";
                                  echo '<td class="text-center">';
                                  echo      '<div class="btn-group-toggle " data-toggle="buttons">';
                                  echo          '<label class="btn  btn-circle btn-sm ' .$state . ' ">';
                                  echo             '<input type="checkbox" id = "checkBox" checked autocomplete = off onclick="changeStatus(' . $rows['truck_id']. ')" />';
                                  echo          '</label>';
                                  echo      '</div>';
                                  echo  '</td>';
                                  echo '</tr>';
                                }
                                ?>


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

</script>


<script>
function myFunction() {
  // Get the checkbox
  var checkBox = document.getElementById("myCheck");
  // Get the output text
  var text = document.getElementById("text");

  // If the checkbox is checked, display the output text
  if (checkBox.checked == true){
    text.style.display = "block";
  } else {
    text.style.display = "none";
  }
}
</script>



</body>



</html>

