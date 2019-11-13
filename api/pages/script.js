function login(){
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;

    if(username == "" || password == ""){
	alert("Please enter a username AND a password.");
    }
    else{
	$.ajax({
	    type: 'post',
	    url: '../user/user_login.php',
	    data: {
		username: username,
		password: password,
	    },
	    success: function(result) {
		var obj = JSON.parse(JSON.stringify(result));
		
		if(obj.message != "success"){
		    alert("Username or password incorrect. Please try again.");
		}
		else{
		    docCookies.setItem("username", username);
		    console.log(docCookies.getItem(username));
		    docCookies.setItem("userid", obj.userid);
		    docCookies.setItem("permission", obj.permission);
		    docCookies.setItem("firstname", obj.firstname);
		    docCookies.setItem("lastname", obj.lastname);
		    window.location.href = "redirectPage.html";
		}
	    }
	});
    }
}

function logout(){
    docCookies.removeItem("username");
    docCookies.removeItem("userid");
    docCookies.removeItem("permission");
    docCookies.removeItem("firstname");
    docCookies.removeItem("lastname");
    window.location.href = "login.html";
}