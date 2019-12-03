function logout(){
    docCookies.removeItem("username");
    docCookies.removeItem("userid");
    docCookies.removeItem("permission");
    docCookies.removeItem("firstname");
    docCookies.removeItem("lastname");
    window.location.href = "login.html";
}


function loggedin(){
    if(docCookies.getItem("userid") == null &&
       window.location.href.indexOf("login.html") == -1){
	window.location.href = "login.html";
    }
    else if(docCookies.getItem("userid") != null &&
	    window.location.href.indexOf("login.html") != -1){
	redirectOnPermissions();	
    }
}

function redirectOnPermissions(){
    var perm = docCookies.getItem("permission");
    if(perm == "Sales Manager" || perm == "Admin"){
	window.location.href = "saleshomepage.html";
    }
    else if(perm == "Flock Manager"){
	window.location.href = "FlockManager.html";
    }
    else if(perm == "Truck Driver"){
	window.location.href = "truckdriver.html";
    }
}

function checkPermissions(permissionNeeded){
    var perm = docCookies.getItem("permission");
    if(perm != permissionNeeded && perm != "Admin"){
	redirectOnPermissions();
    }
    
    if(perm != "Admin"){
        document.getElementById("adminsub").style.display = 'none';
    } else {
        document.getElementById("adminsub").style.display = 'block';
    }
}

function changePassword(){
    var username = $('#username').val();
    var currPass = $('#currentPassword').val();
    var newPass = $('#newPassword').val();
    var reenterPass = $('#reenter').val();

    if(newPass != reenterPass){
	alert("The new password fields don't match. Please try again.");
    }
    else{
	$.ajax({
	    type: 'post',
	    url: '../user/change_password.php',
	    data: {
		username : username,
		currPass : currPass,
		newPass : newPass
	    },
	    success: function(result){
		if(result == "success"){
		    logout();
		}
		else{
		    alert("Incorrect information. Please try again.");
		}
	    }
	});
    }
}
