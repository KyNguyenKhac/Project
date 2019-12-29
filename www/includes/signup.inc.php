<?php
if (isset($_POST['signup-submit'])) {

  require 'connection.php';

  $userName = $_POST['userName'];
  $email = $_POST['eMail'];
  $passWord = $_POST['passWord'];
  $passwordRepeat = $_POST['passWord_2'];

  if (empty($userName) || empty($email) || empty($passWord) || empty($passwordRepeat)) {
    header("Location: ../signup.php?error=emptyfields&userName=".$userName."&email=".$email);
    exit();
  }
  else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/" , $userName))  {
    header("Location: ../signup.php?error=invalid");
    exit();
  }
  else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../signup.php?error=invalidmail&userName=".$userName);
    exit();
  }
  else if (!preg_match("/^[a-zA-Z0-9]*$/",$userName)) {
    header("Location: ../signup.php?error=invalidname&eMail=".$email);
    exit();
  }
  else if ($passWord !== $passwordRepeat) {
    header("Location: ../signup.php?error=wrongcheckpass&userName=".$userName."&email=".$email);
    exit();
  }
  else {

      $sql = "SELECT userName FROM login WHERE userName = ?";
      $stmt = mysqli_stmt_init($conn);

      if (!mysqli_stmt_prepare($stmt,$sql)) {
        header("Location: ../signup.php?error=sqlerror");
        exit();

      }
      else {
        mysqli_stmt_bind_param($stmt, "s" ,$userName);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);

        $resultCheck = mysqli_stmt_num_rows($stmt);
        if ($resultCheck > 0) {
          header("Location: ../signup.php?error=userTaken&email=".$email);
          exit();
        }
        else {
          $sql = "INSERT INTO  login (userName,email ,passWord) VALUES (?,?,?)";
          $stmt = mysqli_stmt_init($conn);
          if (!mysqli_stmt_prepare($stmt,$sql)) {
            header("Location: ../signup.php?error=sqlerror");
            exit();
          }else {

            $hashPwd = password_hash($passWord , PASSWORD_DEFAULT);

            mysqli_stmt_bind_param($stmt,"sss",$userName , $email , $hashPwd);
            mysqli_stmt_execute($stmt);

            header("Location: ../signup.php?signup=success");
            exit();
          }
        }
      }
  }
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
}else {
  header("Location: ../signup.php");
  exit();
}

 ?>
