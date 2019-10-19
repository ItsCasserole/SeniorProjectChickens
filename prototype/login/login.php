<?php
session_start();

if(isset($_SESSION["userid"])){
  header("location: redirectPage.php");
}
?>

<html>
  <head>
    <title>Login Form</title>
    <link rel="stylesheet" href="login.css">
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  </head>
  <body>
    <div class="form">
      <form class="box">
        <h1>Login</h1>
          Username: <input id="username" type="text" name="user" value="" placeholder="Username">
          <br>
          Password: <input id="password" type="password" name="password" value="" placeholder="Password">
          <br>
          <button class="button" type="button" onclick="login();" name="submit" id="submit">Submit</button>
          <br>
      </form>
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

