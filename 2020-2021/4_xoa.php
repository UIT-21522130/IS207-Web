<?php
    include "connect.php";
    $tencv = $_POST['tencv'];

    $sql = "DELETE from ct_bd
            where macv in
                (SELECT ct.macv from ct_bd ct, congviec cv, baoduong b                        
                where ct.macv = cv.macv and b.mabd = ct.mabd
                and tencv = '$tencv'
                )
            limit 1
            ";
    echo $connect->error;
    echo $sql;
    $res = $connect->query($sql);
    $connect->close();
?>