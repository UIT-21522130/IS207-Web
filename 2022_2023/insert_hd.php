<?php
    include "connect.php";
    $tenkh = $_POST['tenkh'];

    $sql = "SELECT distinct(t.mahd)
            FROM hoadon h, khachhang k, thue t
            WHERE h.mahd = t.mahd AND k.makh = h.makh
            AND k.tenkh = '$tenkh'
            ";
    $result = $connect->query($sql);
    echo" <option>Chọn mã </option>";
    if ($result->num_rows > 0) {
        // echo '<div>Mã hóa đơn </div>';
        while ($row = $result->fetch_assoc()) {
            echo '<option value="'. $row['mahd'] .'" class="mahd">' . $row['mahd'] . '</option>';
        }
    }
?>