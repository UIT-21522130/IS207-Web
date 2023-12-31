<?php
// Kết nối cơ sở dữ liệu
include "connect.php";

    $mahd = $_POST["mahd"];
    $maphong = $_POST["maphong"];


    $query = "DELETE FROM thue WHERE mahd = '$mahd' AND maphong = '$maphong'";
    $connect->query($query);

    $query ="UPDATE phong SET tinhtrang = 'trong' WHERE maphong = '$maphong'";
    $connect->query($query);

    $sql = "SELECT * from phong WHERE maphong = '$maphong'";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        $i = 1;
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $i . '</td>';
            echo '<td class="maphong">' . $row['maphong'] . '</td>';
            echo '<td class="ten">' . $row['tenphong'] . '</td>';
            echo '<td><input type="button" class="them" value="Thêm"></td>';
            echo '</tr>';
            $i++;
        }
    }

    $connect->close();

?>