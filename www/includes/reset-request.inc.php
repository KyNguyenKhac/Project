
<?php
if (isset($_POST["reset-password-submit"])) {

  $selector = bin2hex(random_bytes(8));
  $token = random_bytes(32);

  $url = "http://kknkk.000webhostapp.com/fgtpassword/create-new-password.php?selector=".$selector."&validator=".bin2hex($token);

  $expires = date("U") + 1800;

  require "connection.php";

  $userEmail = $_POST["Email"];
  $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?";

  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt,$conn)){
      echo ("sql error");
      exit();
  }else{
    mysqli_stmt_bind_param($stmt,"s",$userEmail);
    mysqli_stmt_execute($stmt);
  }
  $sql = "INSERT INTO pwdReset (pwdResetEmail,pwdResetSelector,pwdResetToken,pwdResetExpire) VALUES (?,?,?,?);";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$conn)){
        echo ("sql error");
        exit();
    }else{
        $hashToken = password_hash($token,PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt,"ssss",$userEmail,$selector,$hashToken,$expires);
        mysqli_stmt_execute($stmt);
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    $to = $userEmail;

    $subject = "Reset your password: ";

    $message = "<p> recieved request . link down there:  </p>";
    $message .="<p>Here your password reset: </br>";
    $message .='<a href="'.$url.'">'.$url.'</a></p>';


    $header = "From: knk <kynguyenkhac28@gmail.com>\r\n";
    $header .= "Reply-To: kynguyenkhac28@gmail.com\r\n";
    $header .= "Content-type: text/html\r\n";

    mail($to, $subject,$message,$header);
    header("Location: ../fgPW.php?reset=success");



}else {
  header("Location: login.php");

}


 ?>
