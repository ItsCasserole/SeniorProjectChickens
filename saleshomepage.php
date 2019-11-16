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

    <title>Simply Fowl | Sales Homepage</title>

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
                <li class="active"><a href="#"><i class="fas fa-home fa-fw"></i> Home</a></li>
                <li><a href="#"><i class="fas fa-box-open fa-fw"></i> Orders</a></li>
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
            </ul>

        </nav>
    </div>


    <!-- Page Content  -->
    <div id="content" >
        <!-- Page Header Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <button type="button" id="sidebarCollapse" class="btn"><i class="fas fa-bars"></i></button>
                <h4 class="nav navbar-nav navbar-center">Sales Home</h4>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">Log Out</a></li>
                </ul>
            </div>
        </nav>

        <!-- Individual Page Content Goes Here -->

        <!-- Announcements Card -->
        <div id="announcements" class="card mx-auto">
            <div class="card-header">
                <h4 class="card-title text-center">Announcements</h4>
            </div>
            <div class="card-body">
                <!-- Comment List -->
                <ul class="media-list">

                    <!-- Dummy Comments for reference. To be removed later on -->
                    <li class="media">
                        <div class="media-body">
                            <strong class="text-primary">Administrator</strong>
                            <small class="text-muted">10:30AM</small>
                            <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet</p>
                        </div>
                    </li>

                    <li class="media">
                        <div class="media-body">
                            <strong class="text-primary">Administrator</strong>
                            <small class="text-muted">10:30AM</small>
                            <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet</p>
                        </div>
                    </li>

                    <li class="media">
                        <div class="media-body">
                            <strong class="text-primary">Administrator</strong>
                            <small class="text-muted">10:30AM</small>
                            <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet</p>
                        </div>
                    </li>

                    <li class="media">
                        <div class="media-body">
                            <strong class="text-primary">Administrator</strong>
                            <small class="text-muted">10:30AM</small>
                            <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet</p>
                        </div>
                    </li>

                    <li class="media">
                        <div class="media-body">
                            <strong class="text-primary">Administrator</strong>
                            <small class="text-muted">10:30AM</small>
                            <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet</p>
                        </div>
                    </li>

                    <li class="media">
                        <div class="media-body">
                            <strong class="text-primary">Administrator</strong>
                            <small class="text-muted">10:30AM</small>
                            <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet</p>
                        </div>
                    </li>

                    <li class="media">
                        <div class="media-body">
                            <strong class="text-primary">Administrator</strong>
                            <small class="text-muted">10:30AM</small>
                            <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet</p>
                        </div>
                    </li>

                    <li class="media">
                        <div class="media-body">
                            <strong class="text-primary">Administrator</strong>
                            <small class="text-muted">10:30AM</small>
                            <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet</p>
                        </div>
                    </li>

                    <li class="media">
                        <div class="media-body">
                            <strong class="text-primary">Administrator</strong>
                            <small class="text-muted">10:30AM</small>
                            <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet</p>
                        </div>
                    </li>

                    <li class="media">
                        <div class="media-body">
                            <strong class="text-primary">Administrator</strong>
                            <small class="text-muted">10:30AM</small>
                            <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet</p>
                        </div>
                    </li>

                    <li class="media">
                        <div class="media-body">
                            <strong class="text-primary">Administrator</strong>
                            <small class="text-muted">10:30AM</small>
                            <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet</p>
                        </div>
                    </li>
                </ul>
            </div>
            
            <div class="card-footer">
                <!-- New Announcement Button to trigger modal -->
		<?php
			if($_SESSION["permission"] == "Admin"){
			    echo "<button type=\"button\" class=\"btn btn-primary\" data-toggle=\"modal\" data-target=\"#newAnnouncementModal\">New Announcement</button>";
			}
		?>

                <!-- Modal -->
                <div class="modal fade" id="newAnnouncementModal" tabindex="-1" role="dialog" aria-labelledby="newAnnouncementModal" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="newAnnouncementModalLabel">New Announcement</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <!-- Text Area -->
                                    <div class="form-group">
                                        <label for="announcementTextarea"><strong>Announcement:</strong></label>
                                        <textarea class="form-control" id="announcementTextarea" rows="4" placeholder="Write your message here..."></textarea>
                                    </div>
                                    <!-- Checkboxes -->
                                    <h6>Recipients:</h6>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="salesCheckbox" value="sales">
                                        <label class="form-check-label" for="salesCheckbox">Sales Managers</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="flockCheckbox" value="flock">
                                        <label class="form-check-label" for="flockCheckbox">Flock Managers</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="truckCheckbox" value="truck">
                                        <label class="form-check-label" for="truckCheckbox">Truck Drivers</label>
                                    </div>
                                    <br>
                                    <br>
                                    <button type="submit" class="btn btn-primary">Post Announcement</button>
                                    <button type="reset" class="btn btn-secondary">Clear</button>
                                </form>
                            </div>
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
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
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



</body>

</html>