<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method = "post">
        <div>Tên khách hàng</div>
        <select name="tenkh" id="tenkh">
            <?php
                include "connect.php";
                $query = "SELECT tenkh FROM khachhang";
                $result = $connect->query($query);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row['tenkh'] . '">' . $row['tenkh'] . '</option>';
                    }
                }
            ?>
        </select>
        <div>Mã hóa đơn</div>
        <input type="input" name = "mahd" required>
        <div>Tên hóa đơn</div>
        <input type="input" name = "tenhd"required>
        <div>Tổng tiền</div>
        <input type="input" name = "tong">
        <input type="submit" value="Thêm" name = "them">
    </form>
    <?php
        include "connect.php";
        
        if (isset($_POST['them'])&&($_POST['them']=="Thêm"))
        {
            $tenkh = $_POST['tenkh'];
            $mahd = $_POST['mahd'];
            $tenhd = $_POST['tenhd'];
            $tong = $_POST['tong'];

            $query = "SELECT makh FROM khachhang WHERE TENKH = '$tenkh'";
            $result = $connect->query($query);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $makh = $row['makh'];

                $sql = "INSERT INTO HOADON VALUES ('$mahd', '$tenhd', '$makh', '$tong')";
                if ($connect->query($sql) === TRUE) {
                    echo "Thêm hóa đơn thành công!";
                } else {
                    echo "Lỗi: " . $connect->error;
                }
            }
            $connect->close();

        }
    ?>
</body>
</html>