<?php
      //getdatainform
      $userName = $_POST["userName"];

      $passWord = $_POST["passWord"];
//      //prevent inject
//      $userName = stripcslashes($userName);
//      $passWord = stripcslashes($passWord);
//
//      $userName = mysqli_real_escape_string($userName);
//      $passWord =mysqli_real_escape_string($passWord);


      //connection
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


if ($result = $conn -> query("SELECT * FROM `login` WHERE userName = '$userName' AND passWord ='$passWord' limit 1")) {

      // Free result sets

      // output data of each row
      while($row = $result->fetch_assoc()) {
            echo "Name: " . $row["userName"]. " - passWord: " . $row["passWord"].  "<br>";
            if ($userName == $row['userName'] &&($passWord == $row['passWord'] )){
                  header("Location: http://localhost:8080/www/diem.php");
                  die();
            }
            else {

                  return header("Location: http://localhost:8080/www/site.php");
            }
      }


}


?>
