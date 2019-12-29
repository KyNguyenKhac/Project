
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Bảng Điểm</title>
    <link rel="stylesheet" href="style02.css">
  </head>
  <body>
    
    <header>
      <div class="MyHeader">
         <h2 id="header">HỆ THỐNG ĐĂNG KÝ HỌC-ĐẠI HỌC THỦY LỢI</h2>
         <span id="blankSpace"><h6 id="status">Khách</h6></span>
      </div>
      <div class="MyNAV">
        <nav>
          <a href="#">Trang Chủ </a>
          <a href="http://localhost:8080/www/site.php">Đăng Nhập</a>
          <a href="#">Hỏi Đáp</a>
          <a href="#">Trợ Giúp</a>
          <select class="" name="combox">
            <option value="0">VN</option>
          </select>
        </nav>



      </div>

    </header>
    <main>
      <table class="table1">
        <tr>
          <td class="font1">Mã sinh viên:</td>
            <?php

            $host = "localhost";
            $dbUserName = "root";
            $dbPassWord = "";
            $dbName ="quanlydiem";
            //create connection
            $conn = new mysqli($host,$dbUserName,$dbPassWord,$dbName);

            if ($conn -> connect_errno) {
                echo "Failed to connect to MySQL: " . $conn -> connect_error;
                exit();
            }
            if ($result = $conn -> query("SELECT MaSV,hoTen FROM `sinhvien` WHERE MaSV = '$userName' limit 1")) {
                while ($row = $result->fetch_assoc()) {


                    ?>
                    <td class="font"><?php echo $row['MaSV']; ?></td>
                    <td class="font1">Họ tên:</td>
                    <td class="font"><?php $row['hoTen']; ?></td>
                    <td class="font1">Trạng thái:</td>
                    <td class="font">ĐANG HỌC</td>
                    <?php
                }
            }
            ?>
        </tr>
        <tr>
          <td class="font1">Khóa:</td>
          <td class="font">K59</td>
          <td class="font1">Ngành:</td>
          <td><select><option value="0">Công Nghệ Thông Tin</option</select></td>
          <td class="font1">Lớp:</td>
          <td class="font">59TH3</td>

        </tr>
        <tr>
          <td class="font1">Chọn học kỳ:</td>
          <td><select><option value="Học Kỳ">-----</option</select></td>
          <td class="font1">Lọc:</td>
          <td colspan="3"><select class="font"><option  value="0">Xem những  học phần đã có điểm và nằm trong chương trình học</option</select></td>

        </tr>
      </table>
    </main>
  </body>
</html>
