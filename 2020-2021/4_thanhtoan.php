<?php
    include "connect.php";
    $tong = $_POST['tong'];
    $date = date('Y-m-d');
    $soxe = $_POST['soxe'];

    $sql = " UPDATE baoduong 
             set thanhtien = '$tong',
                 ngaytra = '$date'
             where soxe = '$soxe' ;
            ";
    $res2 = $connect->query($sql);
    echo $connect->error;
    echo $sql;
?>