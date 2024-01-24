
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<?php
    include "connect.php";
    $mahd = $_POST['mahd'];
    $maphong = $_POST['maphong'];
    $tenphong = $_POST['tena'];

    $sql1 = "UPDATE phong SET tinhtrang = 'full' WHERE maphong = '$maphong'";
    $connect->query($sql1);
    $sql2 = "INSERT into thue values ('$mahd', '$maphong', '', '', '')";
    $connect->query($sql2);

    $sql3 = "SELECT * FROM phong WHERE maphong ='$maphong'";
    $result = $connect->query($sql3);
    if ($result->num_rows > 0) {
        $i = 1;
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' .$i. '</td>';
            echo '<td class="maphong">' .$row['maphong']. '</td>';
            echo '<td class="ten">' .$row['tenphong']. '</td>';
            echo '<td><input type="button" class="xoa" value="Xóa"></td>';
            echo '</tr>';
            $i++;
        }
    }   
   $connect->close(); 
?>
<script>
    $(document).ready(function()
        {
            $(document).on("click", ".xoa", function() 
            {
                const button = $(this); // Lưu tham chiếu của nút "Thêm"
                const maphong = $(this).closest("tr").find(".maphong").text();
                const tenphong = $(this).closest("tr").find(".ten").text();
                const mahd = $(".hoadon").val();
                // Lưu tham chiếu của dòng để xóa sau khi gửi yêu cầu AJAX
                var row = button.closest("tr");

                $.post("remove_room.php",
                                      {
                                        maphong : maphong,
                                        // ten : tenphong,
                                        mahd: mahd
                                      }, function(data, status)
                                        {
                                            if (status == "success")
                                            {
                                            if ($('#empty td.maphong:contains(' + maphong + ')').length === 0) {
                                            // if(data=="success") {   
                                                $('#empty').append(data);
                                                    row.remove();
                                                } 
                                            }
                                                
                                        });
            });
        });
</script>