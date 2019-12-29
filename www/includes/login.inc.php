<?php
if (isset($_POST['login-submit'])) {

  require 'connection.php';

  $userName = $_POST['userName'];
  $passWord = $_POST['passWord'];
  if (empty($userName) || empty($passWord)) {
    header("Location: ../login.php?error=emptyfields");
    exit();
  }
  else {
    $sql = "SELECT * FROM login WHERE userName = ? OR email =?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../login.php?error=sqlerror");
      exit();
    }
    else {

      mysqli_stmt_bind_param($stmt ,"ss",$userName,$userName );
      mysqli_stmt_execute($stmt);
      $result=mysqli_stmt_get_result($stmt);
      if ($row = mysqli_fetch_assoc($result)){
        $pwdCheck = password_verify($passWord, $row['passWord']);
        if ($pwdCheck = false){
          header("Location: ../login.php?error=wrongpwd");
          exit();
        }
        elseif ($pwdCheck = true){
          session_start();
          $_SESSION['userID'] = $row['login_id'];
          $_SESSION['nameUser'] = $row['userName'];

          header("Location: ../login.php?login=success");
          exit();
        }
        else{
          header("Location: ../login.php?error=wrongpwd");
          exit();
        }
      }
      else{
        header("Location: ../login.php?error=nouser");
        exit();
      }
    }
  }

}else {
  header("Location: ../login.php");
  exit();
}

 ?>
