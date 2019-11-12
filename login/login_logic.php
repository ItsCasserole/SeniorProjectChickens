<?php
session_start();

if (!include('connect.php')) {
  die('error finding connect file');
}

$dbh = ConnectDB();
?>

<?php
  $username = $_POST['username'];
  $password = $_POST['password'];

  $sql  = "SELECT user_login('$username', '$password');";

  $stmt = $dbh->prepare($sql);
  $stmt->execute();
  $user_id = $stmt->fetch();
  $stmt = null;

  $arr_var = [-1, -1];

  if($user_id[0] != -1) {
    $sql  = "SELECT user_ID, permission_set, first_name, last_name ";
    $sql .= "FROM User WHERE user_ID = '$user_id[0]';";

    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch();

    $arr_var = [$result['user_ID'], $result['permission_set']];
    $_SESSION["userid"] = $result['user_ID'];
    $_SESSION["username"] = $username;
    $_SESSION["permission"] = $result['permission_set'];
    $_SESSION["firstname"] = $result['first_name'];
    $_SESSION["lastname"] = $result['last_name'];
  }
  echo json_encode($arr_var);
?>

