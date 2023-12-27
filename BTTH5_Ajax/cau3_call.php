<?php
    $servername = "localhost";
    $username = "root";
    $password ="";
    $DBName = "qlsp";

    $conn = mysqli_connect($servername, $username, $password, $DBName)
            Or die("<p> Khong th connect</p>". "<p>Error code: " .mysqli_connect_errno().":" . mysqli_connect_error()."</p>");
    mysqli_set_charset($conn, "utf8");
    $idproduct = $_POST['idproduct'];
    $name = $_POST['name'];
    $nuocsx = $_POST['nuocsx'];
    $dvt = $_POST['dvt'];
    $gia = $_POST['gia'];
    $loaisp = $_POST['loaisp'];
    $hinhanh = $_POST['hinhanh'];

    $sql = $conn->query("INSERT INTO SANPHAM VALUES('$idproduct', '$name','$dvt', '$nuocsx', '$gia', '$hinhanh', '$loaisp')");

    if ($sql == true)
    {
        echo "Thêm thành công!";
    }
    else 
    {
        echo "Thêm thất bại!";
    }
?>






