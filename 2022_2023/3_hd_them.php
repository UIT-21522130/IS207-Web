<?php
    include "connect.php";
    $mahd = $_POST['mahd'];

    $sql ="SELECT p.maphong, tenphong 
           from phong p join thue
           on p.maphong = thue.maphong
           where mahd = '$mahd'";

    $res = $connect->query($sql);
    if ($res->num_rows > 0) {
        $i = 1;
        while ($row = $res->fetch_assoc()) {
            echo '<tr>';
            echo '<td>'.$i.'</td>';
            echo '<td class="maphong">'.$row['maphong'].'</td>';
            echo '<td class="ten">'.$row['tenphong'].'</td>';
            echo '<td><input type="button" class="xoa" value="Xóa"></td>';
            echo '</tr>';
            $i++;
        }
    }
?>