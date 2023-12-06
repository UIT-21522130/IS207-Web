<?php
    $servername = "localhost";
    $username = "root";
    $password ="";
    $DBName = "qlsp";

    $conn = mysqli_connect($servername, $username, $password, $DBName)
            Or die("<p> Khong th connect</p>". "<p>Error code: " .mysqli_connect_errno().":" . mysqli_connect_error()."</p>");
    mysqli_set_charset($conn, "utf8");
    if (isset($_POST["name"])&& isset($_POST['pass']))
    {
        $strSQL = "SELECT * FROM `login` WHERE username='".$_POST["name"]."' and "." password='".$_POST['pass']."'";
        $result = mysqli_query($conn, $strSQL);
        if (mysqli_num_rows($result)>0)
        {
            echo "Chuc mung da dang nhap thanh cong";        
        }
        else echo "Dang nhap khong thanh cong.Vui long dang nhap lai";
    }
?>