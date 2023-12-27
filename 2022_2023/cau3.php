<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div>Mã hóa đơn</div>
    <select name="hoadon" id="hoadon">
        <?php
            include "connect.php";
            $sql = "SELECT mahd from hoadon";
            $result = $connect->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<option id="mahd" value="' . $row['mahd'] . '">' . $row['mahd'] . '</option>';
                    }
                }
        ?>
    </select>
    <h2>Danh sách các phòng còn trống</h2>
        
    <table border="1" id="empty">
        <tr>
            <th>STT</th>
            <th>Mã phòng</th>
            <th>Tên phòng</th>
            <th>Chức năng</th>
        </tr>        
        <?php
            include "connect.php";
            $sql = "SELECT * from phong where tinhtrang = 'trong'";
            $result = $connect->query($sql);
            if ($result->num_rows > 0) {
                $i = 1;
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>'.$i.'<?td>';
                    echo '<td class="maphong">'.$row['maphong'].'</td>';
                    echo '<td class="ten">'.$row['tenphong'].'</td>';
                    echo '<td><input type="button" class="them" value="Thêm"></td>';
                    echo '</tr>';
                    $i++;
                }
            }
        ?>
    </table>
    <h2>Danh sách các phòng đã thêm</h2>
    <table border="1" id="added">
        <tr>
            <th>STT</th>
            <th>Mã phòng</th>
            <th>Tên phòng</th>
            <th>Chức năng</th>
        </tr>
    </table>
    <script>
        $(document).ready(function()
        {
            $(".them").click(function()
            {
                const button = $(this); // Lưu tham chiếu của nút "Thêm"
                const maphong = $(this).closest("tr").find(".maphong").text();
                const tenphong = $(this).closest("tr").find(".ten").text();
                const mahd = $("#hoadon").val();
                // Lưu tham chiếu của dòng để xóa sau khi gửi yêu cầu AJAX
                var row = button.closest("tr");

                $.post("add_room.php",
                                      {
                                        maphong : maphong,
                                        ten : tenphong,
                                        mahd: mahd
                                      }, function(data, status)
                                        {
                                            if (status == "success")
                                            {
                                                $('#added').append(data);
                                                row.remove();
                                            }
                                                
                                        });
            });
        });

    </script>
</body>
</html>