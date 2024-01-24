<?php
    include "connect.php";
    $maddl = $_POST['maddl'];
    $tenddl = $_POST['tenddl'];
    $tenttp = $_POST['tenttp'];
    $dactrung = $_POST['dactrung'];

    $query = "SELECT * 
              FROM diemdl d join tinhtp t on d.mattp = t.mattp
              WHERE maddl = '$maddl'";
    $result1 = $connect->query($query);
    $query = "SELECT mattp, tenttp from tinhtp";
    $result2 = $connect->query($query); 
    
    if ($result1->num_rows > 0) {
        while ($row1 = $result1->fetch_assoc()) {
            echo '<form>';
            echo '<div>'.'Mã điểm du lịch '.'<input type = "input" id="maddl-input" value="'.$row1['maddl'].'"></div><br>';
            echo '<div>'.'Tên điểm du lịch '.'<input type = "input" id="tenddl-input" value="'.$row1['tenddl'].'"></div><br>';
            echo '<div>'.'Tên thành phố '.'</div>'
             .'<select name="tenttp" id="select_tenttp">';
                while ($row2 = $result2->fetch_assoc()) {
                    echo '<option value="'.$row2['mattp'].'"';
                    if ($row2['mattp'] == $row1['mattp']) {
                        echo ' selected';
                    }
                    echo '>'.$row2['tenttp'].'</option>';
                }
                echo '</select>';
                echo '<br>';
            echo '<div>'.'Đặc trưng '.'<input type = "input" id="dactrung-input" value="'.$row1['dactrung'].'"></div><br>';
            echo '<div><input type="button" class="update" value="Update">
                    </div>';
            echo '</form>';
        }
        $result2->close();
    }   
    else
    {
        echo "error";
    }

?>
<script>
    $(document).ready(function() {
        $(document).on("click", ".update", function(event) {
            event.preventDefault(); // Prevent default form submission behavior

            var maddl = $('#maddl-input').val();
            var tenddl = $('#tenddl-input').val();
            var mattp = $(this).closest("form").find("#select_tenttp").val();
            var dactrung = $('#dactrung-input').val();

            $.post("update_ddl.php", {
                                        maddl: maddl,
                                        tenddl: tenddl,
                                        mattp: mattp,
                                        dactrung: dactrung
                        }, function(data, status) {
                            if (status == "success") {
                                if (data == "success") {
                                    alert('Update successful');
                                } else {
                                    alert("Update failed");
                                }
                            } else {
                                alert("Request failed");
                            }
                        });
        })
    })

</script>