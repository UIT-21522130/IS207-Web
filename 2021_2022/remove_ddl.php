<?php
    include "connect.php";
    $maddl = $_POST['maddl'];
    $tenddl = $_POST['tenddl'];
    $tenttp = $_POST['tenttp'];
    $dactrung = $_POST['dactrung'];

    $query = "DELETE from chitiet where maddl = '$maddl'";
    $result1 = $connect->query($query);
    $query = "DELETE from diemdl where maddl = '$maddl'";
    $result2 = $connect->query($query);
    if ($result1 && $result2) {
        echo "success";
      } else {
        echo "error";
      }

?>