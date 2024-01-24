<?php
    include "connect.php";

    $mahd = $_POST['mahd'];

    $sql="SELECT p.maphong, loaiphong
    FROM hoadon h, phong p, thue t
    WHERE h.mahd = t.mahd AND p.maphong = t.maphong
    AND t.mahd = '$mahd'
    ";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        $i =1;
        echo '<table>';
        echo '<th>STT</th>';
        echo '<th>Mã phòng</th>';
        echo '<th>Loại phòng</th>';
        while ($row = $result->fetch_assoc()) {
            
            echo '<tr>';
            echo '<td>' .$i. '</td>';
            echo '<td >' .$row['maphong']. '</td>';
            echo '<td >' . $row['loaiphong'] . '</td>';
            echo '</tr>';
            $i++;
        }
        echo '</table>';
    }
?>