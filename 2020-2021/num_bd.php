<?php
    include "connect.php";
    $number = $_POST['number'];

    $sql ="SELECT hotenkh, xe.soxe, count(mabd) as solanbd
           from baoduong b, xe, khachhang k
           where b.soxe = xe.soxe and k.makh = xe.makh
           group by hotenkh, xe.soxe
           having count(mabd) >= '$number'
           ";
    $res = $connect->query($sql);
    echo $connect->error;
    if($res->num_rows > 0)
    {
        echo "<table border='1'>
                <tr>
                    <th>Họ tên khách hàng</th>
                    <th>Số xe</th>
                    <th>Số lần bảo dưỡng</th>
                </tr>
              ";
        while ($row = $res->fetch_assoc())
        {
            echo '<tr>';
            echo '<td>'.$row['hotenkh'].'</td>';
            echo '<td>'.$row['soxe'].'</td>';
            echo '<td>'.$row['solanbd'].'</td>';
            echo '</tr>';
        }
        echo '</table>';
    }
?>