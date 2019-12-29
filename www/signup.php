<?php
  require "header.php";
?>
<main>

  <?php

  if (isset($_GET['error'])) {
    if ($_GET['error'] == "emptyfields") {
      echo '<p class="signup-error">Fields are required!!!</p>';
    }
    elseif ($_GET['error'] == "invalid") {
      echo '<p class="signup-error">Invalid!!!</p>';
    }
    elseif ($_GET['error'] == "invalidmail") {
        echo '<p class="signup-error">Invalid Mail!!!</p>';
    }
    elseif ($_GET['error'] == "invalidname") {
      echo '<p class="signup-error">Invalid user!!!</p>';
    }
    elseif($_GET['error'] == "wrongcheckpass") {
        echo '<p class="signup-error">Password not match!!!</p>';
    }
    elseif ($_GET['error'] == "userTaken") {
      echo '<p class="signup-error">User Name has been taken</p>';
      }

    }
    elseif ($_GET["signup"] == "success") {
      echo '<p class="signup-success">Sign Up Successful!</p>';
  }
   ?>
<form class="" action="includes/signup.inc.php" method="post">
  <table>
    <caption><h2>Register</h2></caption>
    <tr>
      <td>UserName: </td>
      <td><input type="text" name="userName" value=""></td>
    </tr>

    <tr>
      <td>Email: </td>
      <td><input type="text" name="eMail" value=""></td>
    </tr>

    <tr>
      <td>PassWord: </td>
      <td><input type="password" name="passWord" value=""></td>
    </tr>

    <tr>
      <td>Repeat PassWord:  </td>
      <td><input type="password" name="passWord_2" value=""></td>
    </tr>

    <tr>
      <td colspan="2"></td>
      <td ><button type="submit" name="signup-submit" class="btn">Register</button></td>
    </tr>

  </table>
</form>
</main>
<?php
  require "footer.php";
?>
