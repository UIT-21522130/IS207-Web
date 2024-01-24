<?php
    include "connect.php";
    $maddl = $_POST['maddl'];
    $tenddl = $_POST['tenddl'];
    $mattp = $_POST['mattp'];
    $dactrung = $_POST['dactrung'];
    
    $query1 = "UPDATE diemdl 
            SET tenddl = '$tenddl', dactrung ='$dactrung',
            mattp = '$mattp'
            WHERE maddl = '$maddl'";
    
    $res = $connect->query($query1);
    if ($res === false) {
        echo "Update failed: " . $connect->error;
    } else {
        if ($connect->affected_rows > 0) {
            echo "Update successful";
        } else {
            echo "No rows updated";
        }
    }
    
    mysqli_close($connect);
?>