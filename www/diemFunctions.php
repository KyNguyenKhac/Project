

<?php




$conn = mysqli_connect("localhost","root","",quanlydiem);
if($conn->connect_error){
    die("Connection Fail: ". $conn->connect_error);
}



if ($result = $conn -> query("SELECT MaSV,hoTen FROM `sinhvien` WHERE MaSV = '$userName' limit 1")) {

    // Free result sets

    // output data of each row
    while($row = $result->fetch_assoc()) {

        if ($userName == $row['userName'] &&($passWord == $row['passWord'] )){
            header("Location: http://localhost:8080/www/diem.php");
            die();
        }
        else {


        }
    }


}

    ?>