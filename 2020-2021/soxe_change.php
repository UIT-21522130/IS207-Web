<?php
    include "connect.php";
    $soxe = $_POST['soxe'];

    $sql = "SELECT hotenkh 
            from khachhang k inner join xe on xe.makh = k.makh
            where xe.soxe = '$soxe'";
    $res = $connect->query($sql);
    if ($res->num_rows >0)
    {
        echo $connect->error;
        while ($row =$res->fetch_assoc())
        {
            echo $row['hotenkh'];
        }
    }
?>