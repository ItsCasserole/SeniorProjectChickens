<?php
session_start();

if(isset($_SESSION["userid"])){
  header("location: redirectPage.php");
}
?>

<html>
<head>
  <title>Change Password</title>  
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="login.css">
</head>
<body>
  <div class="d-flex align-items-center justify-content-center min-vh-100 container">
    <div class="info-form">
      <div class="page-header">
	<h1>Change Password</h1>
      </div>
      <form action="" class="form">
	<div class="form-group">
	  <label class="sr-only">Username:</label>
	  <input type="text" class="form-control" placeholder="Username" name="username" id="username">
	</div>
	<div class="form-group">
	  <label class="sr-only">Current Password:</label>
	  <input type="password" class="form-control" placeholder="Current Password" name="current_password" id="current_password">
	</div>
	<div class="form-group">
	  <label class="sr-only">New Password:</label>
	  <input type="password" class="form-control" placeholder="New Password" name="new_password" id="new_password">
	</div>
	<div class="form-group">
	  <label class="sr-only">Re-enter New Password:</label>
	  <input type="password" class="form-control" placeholder="Re-enter New Password" name="reenter" id="reenter">
	</div>
	<button type="button" class="btn" onclick="changePassword();">Submit</button>
      </form>
    </div>
  </div>
</body>

<script language="javascript">
  function changePassword(){
    var username = $('#username').val();
    var currentPassword = $('#current_password').val();
    var newPassword = $('#new_password').val();
    var reenter = $('#reenter').val();

    if(username == "" || currentPassword == "" 
       || newPassword == "" || reenter == ""){
      alert("Please fill out all fields.");
    }
    else{
      $.ajax({
        type: 'post',
	url: 'change_password_logic.php',
	data: {
	  username: username,
	  currentPassword: currentPassword,
	  newPassword: newPassword,
	  reenter: reenter
        },
	success: function(result) {
	  var obj = JSON.parse(result);
	  if(obj[0] == "success"){
	    window.location.href = 'login.php';
	  }
	  else{
	    var alertMessage = "Password change failed. Please try again.";
	    alert(alertMessage);
	  }	  
	}
      });
    }
  }
</script>
</html>


