<?php
if (isset($_POST["reset-password-submit"])) {
  $selector = $_POST["selector"];
  $validator = $_POST["validator"];
  $password = $_POST["pwd"];
  $passwordRepeat = $_POST["pwd-repeat"];

  if (empty($password) || empty($passwordRepeat)) {
    header("Location: ../create-new-password.php?newpwd=empty");
    exit();

  }elseif ($password !== $passwordRepeat) {
    header("Location: ../create-new-password.php?newpwd=pwdnotsame");
    exit();

  }
  $currentDate = date("U");
  require 'connection.php';

  $sql ="SELECT * FROM pwdReset WHERE pwdResetSelector=? AND pwdResetExpires >=?";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt,$sql)) {
    echo "Error";
    exit();
    // error
  }
  else {
    mysqli_stmt_bind_param($stmt ,"s",$selector);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result();
    if (!$row = mysqli_fetch_assoc($result)) {
      echo "You need re-submit";
      exit();
    }else{
      $tokenBin = hex2bin($validator);
      $tokenCheck = password_verify($tokenBin, $row["pwdResetToken"]);

      if ($tokenCheck === false){
            echo "You need re-submit";
            exit();
      }elseif ($tokenCheck === true){
        $tokenEmail = $row["pwdResetEmail"];

        $sql = "SELECT * FROM login WHERE email = ?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $conn)) {
          echo "Error";
          exit();

        }else {
          mysqli_stmt_bind_param($stmt, "s" , $tokenEmail);
          mysqli_stmt_execute($stmt);

          $result = mysqli_stmt_get_result($stmt);
          if (!$row = mysqli_fetch_assoc($result)) {
            echo "error";
            exit();

          }else{

              $sql = "UPDATE login SET passWord=? WHERE email =?";
              $stmt = mysqli_stmt_init($conn);
              if (!mysqli_stmt_prepare($stmt,$conn)) {
                echo "error";
                exit();
              }
              else{
                $newPwdHash = password_hash($password, PASSWORD_DEFAULT);
                mysqli_stmt_bind_param($stmt , "ss", $newPwdHash, $tokenEmail);
                mysqli_stmt_execute($stmt);

                $sql = "DELETE FROM pwdReset WHERE pwdResetEmail =?";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt , $conn)) {
                  echo "error";
                  exit();

                }else{
                  mysqli_stmt_bind_param($stmt , "s" ,$tokenEmail);
                  mysqli_stmt_execute($stmt);
                  header("Location: ../signup.php?newpwd=passwordupdated");

                }
              }

          }
        }
      }

    }
  }


}else {
  header("Location: ../login.php");
}

 ?>
