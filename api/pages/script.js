function logout(){
    docCookies.removeItem("username");
    docCookies.removeItem("userid");
    docCookies.removeItem("permission");
    docCookies.removeItem("firstname");
    docCookies.removeItem("lastname");
    window.location.href = "login.html";
}

function loggedin(){
    if(docCookies.getItem("userid") == null){
	window.location.href = "login.html";
    }
}

