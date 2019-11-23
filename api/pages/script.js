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
}
