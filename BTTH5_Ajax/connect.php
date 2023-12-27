<?php
    $servername = "localhost";
    $username = "root";
    $password ="";
    $DBName = "qlsp";

    $conn = mysqli_connect($servername, $username, $password, $DBName)
            Or die("<p> Khong th connect</p>". "<p>Error code: " .mysqli_connect_errno().":" . mysqli_connect_error()."</p>");
    mysqli_set_charset($conn, "utf8");
?>