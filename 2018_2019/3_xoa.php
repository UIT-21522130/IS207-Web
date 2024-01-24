<?php
    include "connect.php";
    $tenpl = $_POST['tenpl'];
    $sql = "DELETE from playlist_baihat
            where maplaylist in
                            (SELECT maplaylist 
                             from playlist 
                             where tenplaylist = '$tenpl')";
    $sql2 = "DELETE from playlist
             where tenplaylist ='$tenpl'";
    $res1 = $connect->query($sql);
    $res2 = $connect->query($sql2);
    if ($connect->query($sql) === TRUE) {
        echo "Deletion successful";
    } else {
        echo "Error: " . $sql . "<br>" . $connect->error;
    }
    $connect->close();
?>