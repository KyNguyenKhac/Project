
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Đăng Ký</title>
    <link rel="stylesheet" href="registerstyle.css">
  </head>
  <body>
    <header>
      <div class="MyHeader">
         <h3 id="header">HỆ THỐNG ĐĂNG KÝ HỌC-ĐẠI HỌC THỦY LỢI</h3>
         <img src="topright.jpg" alt="error">
         <h6 id="status">Khách</h6>

      </div>
      <div class="MyNAV">
        <nav>
          <a href="#">Trang Chủ |</a>
          <a href="#">Đăng Nhập |</a>
          <a href="#">Hỏi Đáp |</a>
          <a href="#">Trợ Giúp |</a>
          <select class="" name="combox">
            <option value="VN">VN</option>
          </select>
        </nav>
      </div>

    </header>
    <main>

      <?php


       ?>
<form class="" action="functions.php" method="post">


<table>
  <caption><h2>Register</h2></caption>
  <tr>
    <td>UserName: </td>
    <td><input type="text" name="username" value=""></td>
  </tr>
  <tr>
    <td>PassWord: </td>
    <td><input type="password" name="password_1" value=""></td>
  </tr>
  <tr>
    <td>Quyen:  </td>
    <td><input type="text" name="quyen" value=""></td>
  </tr>
  <tr>
    <td>Email: </td>
    <td><input type="text" name="email" value=""></td>
  </tr>
  <tr>
    <td colspan="2"></td>
    <td ><button type="button" name="register_btn" class="btn">Register</button></td>
  </tr>
</table>

</form>

    </main>
     <footer>
       <div class="block">


         <table>
           <tr>
             <td class="whatsups">Đường dây nóng</td>
           </tr>
           <tr>
             <td class="callme">024.38521441</td>
           </tr>
         </table>
      </div>
    </footer>


  </body>
</html>
