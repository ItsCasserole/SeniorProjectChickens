<?php
session_start();

if(isset($_SESSION["userid"])){
  header("location: redirectPage.php");
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Bootstrap Example</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="login.css">
    </head>
    <body>
        <div class="d-flex align-items-center justify-content-center min-vh-100 container">
            <div class="info-form">
		<img src="simplyfowl.8ba56115.png" class="img-rounded">
		<div class="page-header">
		    <h1>Login</h1>
		</div>
                <form action="" class="form">
                    <div class="form-group">
                        <label class="sr-only">Username:</label>
	                <input type="text" class="form-control" placeholder="Username" name="username" id="username">
                    </div>
		    <div class="form-group">
                        <label class="sr-only">Password:</label>
                        <input type="password" class="form-control" placeholder="Password" name="password" id="password">
                    </div>
		    <button type="button" class="btn" onclick="login()">Submit</button>
                </form>
            </div>
        </div>
    </body>

    
  <script language="javascript">
    function login(){
    	
      var username = $('#username').val();
      var password = $('#password').val();

      if(username == "" || password == ""){
        alert("Please enter a username AND a password");
      }
      else{
        $.ajax({
          type: 'post',
          url: 'login_logic.php',
          data: {
            username: username,
            password: password
          },
          success: function(result) {
            var obj = JSON.parse(result);
            if(obj[0] == -1){
              alert("Username or password incorrect. Please try again.");
            }
            else{
                window.location.href = 'redirectPage.php';
            }
          }
        });
      }

    }
  </script>
</html>

