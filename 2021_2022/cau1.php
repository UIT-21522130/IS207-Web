<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method = "POST">
        <div>Mã tour</div>
        <input type="input" name = "matour">
        <div>Tên tour</div>
        <input type="input" name = "tentour">
        <div>Ngày khởi hành</div>
        <input type="date" name = "date">
        <div>Số ngày</div>
        <input type="number" name = "songay">
        <div>Số đêm</div>
        <input type="number" name = "sodem">
        <div>Giá</div>
        <input type="number" name = "gia">
        <input type="submit" name="them" value="Thêm">
    </form>
    <?php
        
        include "connect.php";
        if(isset($_POST['them']) && ($_POST['them']=="Thêm"))
        {
            $matour = $_POST['matour'];
            $tentour = $_POST['tentour'];
            $date = $_POST['date'];
            $songay = $_POST['songay'];
            $sodem = $_POST['sodem'];
            $gia = $_POST['gia'];

            $sql = "INSERT into tour value ('$matour', '$tentour', '$date', '$songay', '$sodem', '$gia' )";
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
</body>
</html>