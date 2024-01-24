<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <h2>Thêm khách hàng</h2>
        <div>Mã khách hàng</div>
        <input type="input" name ="ma">
        <div>Họ tên khách hàng</div>
        <input type="input" name ="hoten">
        <div>Địa chỉ</div>
        <input type="input" name ="dc">
        <div>Điện thoại</div>
        <input type="input" name ="dt">
        <input type="submit" name ="them" value="Thêm">
    </form>
    <?php
        include "connect.php";
        if(isset($_POST['them']) && ($_POST['them']=='Thêm'))
        {
            $ma = $_POST['ma'];
            $ten = $_POST['hoten'];
            $dc = $_POST['dc'];
            $dt = $_POST['dt'];

            $sql = "INSERT INTO khachhang VALUE ('$ma', '$ten', '$dc', '$dt')";
            echo $connect->error;
            if($connect->query($sql)==true)
            {
                echo "Success";
            }
            else
            {
                echo "Failed";
            }
            $connect->close();
        }
    ?>
</body>
</html>