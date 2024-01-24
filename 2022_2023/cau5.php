<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div>Tên khách hàng
        <select name="tenkh" class="cb_tenkh">
            <?php 
                include "connect.php";
                $sql = "SELECT tenkh from khachhang";
                $result = $connect->query($sql);
                echo $connect->error;
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                    echo '<option value="'. $row['tenkh'] .'" class="tenkh">' . $row['tenkh'] . '</option>';
                }}
            ?>
        </select>
    </div>
    <div>Mã hóa đơn
        <select name="mahd" id="mahd">
        </select>
    </div>
    <div>Danh sách các phòng trong hóa đơn</div>
    <div id="table"></div>
</body>
<script>
    $(document).ready(function() {
        $(document).on("change", ".cb_tenkh", function() {
            var tenkh = $(this).val();

            $.post("insert_hd.php", 
                                { 
                                    tenkh: tenkh
                                }, 
            function(data, status) 
            {
                if (status === "success") {
                        $("#mahd").html(data);
                    }
            });
        });
    })
    $(document).ready(function() {
        $(document).on("change", "#mahd", function() {
            var mahd = $(this).val();

            $.post("insert_phong.php", 
                                { 
                                    mahd: mahd
                                }, 
            function(data, status) 
            {
                if (status === "success") {
                        $("#table").html(data);
                    }
            });
        });
    })
</script>
</html>