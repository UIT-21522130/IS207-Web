<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include "connect.php";  
        if(isset($_POST['them']) && ($_POST['them']=="Thêm")) 
        {
            $ma = $_POST['ma'];
            $ten = $_POST['ten'];
            $sdt = $_POST['sdt'];
            $cccn = $_POST['cccn'];

            $sql = "INSERT into khachhang value('$ma', '$ten', '$sdt', '$cccn')";
            if($connect->query($sql)==true)
            {
                echo "Thêm thành công";
            }
            else
            {
                echo "Thêm không thành công";
            }
            $connect->close();               
        } 
    ?>
    <form action="" method = "post">
        <div>Mã khách hàng</div>
        <input type="input" name = "ma">
        <div>Tên khách hàng</div>
        <input type="input" name = "ten">
        <div>Số điện thoại</div>
        <input type="input" name = "sdt">
        <div>Căn cước công nhân</div>
        <input type="input" name = "cccn">
        <input type="Submit" name = "them" value="Thêm">  
    </form>
</body>
</html>