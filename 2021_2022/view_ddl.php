<?php
    include "connect.php";
    $maddl = $_POST['maddl'];
    $tenddl = $_POST['tenddl'];
    $tenttp = $_POST['tenttp'];
    $dactrung = $_POST['dactrung'];

    $query = "SELECT * 
              FROM diemdl d join tinhtp t on d.mattp = t.mattp
              WHERE maddl = '$maddl'";
    $result = $connect->query($query);
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="maddl">'.'Mã điểm du lịch '.$row['maddl'].'</div>';
            echo '<div class="tenddl">'.'Tên điểm du lịch '.$row['tenddl'].'</div>';
            echo '<div class="tenttp">'.'Tên thành phố '.$row['tenttp'].'</div>';
            echo '<div class="feature">'.'Đặc trưng '.$row['dactrung'].'</div>';
            echo '<div><input type="button" class="update" value="Update">
                    </div>';
        }
    }   
    // else
    // {
    //     echo "error";
    // }

?>