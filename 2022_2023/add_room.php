<?php
    include "connect.php";

    $mahd = $_POST['mahd'];
    $maphong = $_POST['maphong'];
    $tenphong = $_POST['ten'];

    $sql1 = "UPDATE phong SET tinhtrang = 'full' WHERE maphong = '$maphong'";
    $connect->query($sql1);

    $sql2 = "SELECT * FROM phong WHERE maphong ='$maphong'";
    $result = $connect->query($sql2);
    if ($result->num_rows > 0) {
        $i = 1;
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>'.$i.'</td>';
            echo '<td>'.$row['maphong'].'</td>';
            echo '<td>'.$row['tenphong'].'</td>';
            echo '<td><input type="button" class="xoa" value="Xóa"></td>';
            echo '</tr>';
            $i++;
        }
    }
?>