
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Đăng Nhập</title>
    <link rel="stylesheet" href="teststyleww.css">
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
          <a href="http://localhost:8080/www/site.php">Đăng Nhập |</a>
          <a href="#">Hỏi Đáp |</a>
          <a href="#">Trợ Giúp |</a>
          <select class="" name="combox">
            <option value="VN">VN</option>
          </select>
        </nav>
      </div>

    </header>
    <main>



       <script src="script.js"></script>
      <img class="image" src="login.jpg" alt="loginPic">


      <form class="myform" action="connect.php" method="post">
        <table>
          <tr>
            <td>Tài Khoản :</td>
            <td><input id="" type="text" name="userName" value="" required></td>
          </tr>
          <tr>
            <td>Mật Khẩu :</td>
            <td><input id="" type="password" name="passWord" value="" required></td>
          </tr>
        </table>
        <input id="dangnhap" type="submit" name="" value="Đăng Nhập">
        <a href="#">[Quên Mật Khẩu]</a>
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
