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
    <select name="hoadon" class="hoadon">
        <?php
            include "connect.php";
            $sql = "SELECT mahd from hoadon";
            $result = $connect->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<option class="mahd" value="' . $row['mahd'] . '">' . $row['mahd'] . '</option>';
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
        $(document).on("change", ".hoadon", function() 
            {
                var mahd = $('.hoadon').val()
                $("#empty tr:not(:first-child)").remove();
                $("#added tr:not(:first-child)").remove();
                $.post("3_hd_change.php",
                                    {
                                        mahd: mahd
                                    }, 
                                    function(data, status)
                                        {
                                            if (status == "success")
                                            {
                                                $("#empty").append(data)
                                            }
                                        });
                $.post("3_hd_them.php", 
                                    {
                                        mahd: mahd
                                    }, 
                                    function(data, status)
                                        {
                                            if (status == "success")
                                            {
                                                $("#added").append(data)
                                            }
                                        });
            });
        
        });
        $(document).on("click", ".them", function() 
            {
                var button = $(this); 
                var mahd = $(".hoadon").val();
                var maphong = $(this).closest('tr').find('td:eq(1)').text();
                var row = $(this).closest("tr");

                $.post("3_add_room.php",
                                    {
                                        mahd: mahd,
                                        maphong: maphong
                                    }, function(data, status)
                                        {
                                            if (status == "success")
                                            if ($('#added td.maphong:contains(' + maphong + ')').length === 0) {
                                                var newRow = '<tr>' + data + '</tr>';
                                                $('#added').append(newRow);
                                                row.remove();
                                            } 
                                                
                                        });
            });

</script>
</body>
</html>