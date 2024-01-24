<?php
    include "connect.php";
    $mahd = $_POST['mahd'];
    // $maphong = $_POST['maphong'];
    $date = date('Y-m-d');
    $sql = "SELECT * from phong where tinhtrang = 'trong' 
            and maphong not in
                              (SELECT maphong
                              from thue )
                              ";
    $result = $connect->query($sql);
    if ($result->num_rows > 0) {
        $i = 1;
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>'.$i.'</td>';
            echo '<td class="maphong">'.$row['maphong'].'</td>';
            echo '<td class="ten">'.$row['tenphong'].'</td>';
            echo '<td><input type="button" class="them" value="Thêm"></td>';
            echo '</tr>';
            $i++;
        }
    }
?>    
