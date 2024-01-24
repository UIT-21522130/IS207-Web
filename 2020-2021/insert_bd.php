<?php
    include "connect.php";
    $soxe = $_POST['soxe'];
    $mabd = $_POST['mabd'];
    $sokm = $_POST['sokm'];
    $nd = $_POST['nd'];
    $date = date('Y-m-d');

    $sql ="INSERT into baoduong value ('$mabd', '$date', NULL, '$sokm', '$nd', '$soxe', NULL)";
    $res = $connect->query($sql);
    // if($res->num_rows>0)
    // {

    // }
?>