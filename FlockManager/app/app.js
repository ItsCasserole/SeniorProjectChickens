$(document).ready(function(){
	// app html
var app_html=`<div class="wrapper">
        <!--Sidebar--!>
         <div>
         <nav id="sidebar" class="fixed">
                <div class="sidebar-header"><h3 class="text-center">Simply Fowl</h3></div>
		 <ul class="list-unstyled components">
                <li><a href="#"><i class="fas fa-home fa-fw"></i> Home</a></li>
                <li><a href="#"><i class="fas fa-box-open fa-fw"></i> Orders</a></li>
                <li><a href="#"><i class="fas fa-truck fa-fw"></i> Dispatch</a></li>
                <li><a href="#"><i class="fas fa-briefcase fa-fw"></i> Shipments</a></li>
                <li><a href="#"><i class="fas fa-wrench fa-fw"></i> Maintenance</a></li>
                <li>
                    <a href="#adminSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fas fa-user-cog fa-fw"></i> Admin</a>
                    <ul class="collapse list-unstyled" id="adminSubmenu">
                        <li class="active"><a href="#">View Flock Info</a></li>
                        <li><a href="#">Manage Accounts</a></li>
                    </ul>
                </li>
            </ul>
         </nav>
</div>
	<div id='content'>		
		<!-- Page Header Navbar -->
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <div class="container-fluid">
                                <button type="button" id="sidebarCollapse" class="btn"><i class="fas fa-bars"></i></button>
                                <h4 class="nav navbar-nav navbar-center">Flock Manager</h4>
                                <ul class="nav navbar-nav navbar-right">
                                        <li><a href="#">Log Out</a></li>
                                </ul>
                        </div>
                </nav>
	
		<div class='container'>
            <div class = 'page-header'>
            <h1 id='page-title' class= 'card-title'>Flock Manager</h5>
        </div>
		<!-- this is where the contents will be shown. -->
            <div id='page-content'></div>
		</div>
        </div>
		</div>`; 
    // inject to 'app' in index.html
    $("#app").html(app_html);
        
});

// change page title
function changePageTitle(page_title){

    //change page title
    $('#page-title').text(page_title);

    //change title tag
    document.title=page_title;
}

// function to make form values to json format
$.fn.serializeObject = function()
{
    var o = {};
    var a = this.serializeArray();
    $.each(a, function() {
        if (o[this.name] !== undefined) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });
    return o;
};
