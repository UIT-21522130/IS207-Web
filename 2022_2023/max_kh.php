<?php
    include "connect.php";
   $max_kh = $_POST['max_kh'] ;

   $sql = " SELECT t.mahd, k.makh, k.tenkh, sum(tongtien) as tongtienthue
            FROM hoadon h, khachhang k, thue t
            WHERE h.mahd = t.mahd AND k.makh = h.makh
            GROUP BY t.mahd, k.makh, k.tenkh
            ORDER BY tongtienthue desc
            LIMIT $max_kh;
          ";
            
    $result = $connect->query($sql);
    echo $connect->error;
    if ($result->num_rows > 0) {{
        $i =1;
        echo  $max_kh .' khách hàng có số tiền thuê nhiều nhất';
        echo '<table><tr>';
        echo '<th>STT</th>';
        echo '<th>Mã khách hàng</th>';
        echo '<th>Tên khách hàng</th>';
        echo '<th>Tổng tiền thuê</th></tr>';
        while ($row = $result->fetch_assoc()) {
            
            echo '<tr>';
            echo '<td>' .$i. '</td>';
            echo '<td class="makh">' .$row['makh']. '</td>';
            echo '<td class="tenkh">' . $row['tenkh'] . '</td>';
            echo '<td class="tenkh">' . $row['tongtienthue'] . '</td>';
            echo '</tr>';
            $i++;
        }
        echo '</table>';

    }}
?>