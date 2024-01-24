<?php
    include "connect.php";
    $tencd = $_POST['tencd'];
    $gt = $_POST['gt'];
    $ns = $_POST['ns'];
    $nv = $_POST['nv'];
    $tendcl = $_POST['tendcl'];

    $sql ="UPDATE congdan
           set tencongdan = '$tencd', gt='$gt', ns='$ns', nv='$nv', madcl='$tendcl'";
    $res = $connect->query($sql);
    if($res==false)
    {
        echo $connect->error;
    }
    $connect->close();
?>