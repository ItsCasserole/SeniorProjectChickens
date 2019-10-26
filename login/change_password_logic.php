<?php
session_start();

if (!include('connect.php')) {
  die('error finding connect file');
}

$dbh = ConnectDB();
?>

<?php
  $username = $_POST['username'];
  $currentPassword = $_POST['currentPassword'];
  $newPassword = $_POST['newPassword'];
  $reenter = $_POST['reenter'];

  $sql  = "SELECT changePassword('$username', '$currentPassword', ";
  $sql .= "'$newPassword', '$reenter')";

  $stmt = $dbh->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetch();

  $arr_var = [$result[0]];
  echo json_encode($arr_var);
?>
