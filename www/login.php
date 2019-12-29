
<?php
  require 'loginHeader.php';
?>
<main>

  <img class="image" src="login.jpg" alt="loginPic">


  <form class="myform" action="includes/login.inc.php" method="post">
    <table>
      <tr>
        <td>Tài Khoản :</td>
        <td><input id="" type="text" name="userName" value="" ></td>
      </tr>
      <tr>
        <td>Mật Khẩu :</td>
        <td><input id="" type="password" name="passWord" value="" ></td>
      </tr>
    </table>

      <button type="submit" name="login-submit" id="dangnhap">Đăng Nhập</button>
      <?php
      // if (isset($_GET['newpwd'])) {
      //   if ($_GET['newpwd'] == "passwordupdated") {
      //     echo "<p class='signupsuccess'>Your password has been reset</p>";
      //   }
      }

       ?>



    <a href="#">[Quên Mật Khẩu]</a>
  </form>

</main>

<?php require 'footer.php' ?>
