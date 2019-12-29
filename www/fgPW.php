<?php
require 'fgPWheader.php';
 ?>
    <main>

    <form class="" action="includes/reset-request.inc.php" method="post">


      <h2 id="suggest">Gõ tên đăng nhập, đìa chỉ email đã đăng ký rồi nhấn nút "Gửi đi", hệ thống sẽ gửi mật khẩu theo địa chỉ email đã đăng ký!</h2>
      <div class="form">
      <p id="fix1">Tên Người Dùng :</p>
      <p id="fix">Địa Chỉ Email :</p>
      <input type="text" name="userName" value="">
      <input id="email" type="text" name="Email" value="">
      <!-- <input type="submit" name="reset-password-submit" value="Gửi Đi"> -->
      <button type="submit" name="reset-password-submit">Gửi Đi</button>
      </div>
    </form>
        <?php
        if(isset($_GET['reset'])){
            if(isset($_GET['success'])){
                echo "<p class='signup-success'>Check Your Email!!</p>";
            }
        }

        ?>
    </main>


<?php
require 'footer.php';

 ?>
