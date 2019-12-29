
<?php

$host = "localhost";
$dbUserName = "root";
$dbPassWord = "";
$dbName ="quanlydiem";


$conn = mysqli_connect( $host,$dbUserName,$dbPassWord,$dbName);

if (!$conn) {
  die("Connection Failed: ".mysqli_connect_error());
}



?>
