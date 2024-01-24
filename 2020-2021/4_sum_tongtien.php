<?php
    include "connect.php";
    $soxe = $_POST['soxe'];

    $sql = "SELECT sum(dongia) tongtien
            from congviec c, ct_bd ct, baoduong b
            where c.macv = ct.macv and b.mabd = ct.mabd
                and soxe = '$soxe'
            ";
    $res = $connect->query($sql);
    $row = $res->fetch_assoc();
    echo $row['tongtien'];
?>