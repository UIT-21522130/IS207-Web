<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method ="post">
    <h2>Thêm thông tin khách hàng</h2>
    <div>Họ tên khách hàng</div>
    <select name="hotenkh">
        <?php
            include "connect.php";
            $sql = "SELECT hotenkh from khachhang";
            $res = $connect->query($sql);
            echo $connect->error;
            if($res->num_rows >0)
            {
                while ($row = $res->fetch_assoc())
                {
                    echo '<option value="'.$row['hotenkh'].'"> '.$row['hotenkh'].'</option>';
                }
            }
        ?>
    </select>
    <div>Số xe</div>
    <input type="input" name ='soxe' required>
    <div>Hãng xe</div>
    <select name="hangxe" id ='hangxe' multiple >
        <option value="toyota" >toyota</option>
        <option value="bmw">BMW</option>
        <option value="audi">Audi</option>
    </select>
    <div>Năm sản xuất</div>
    <input type="input" name ='namsx' required>
    <input type="submit" value="Thêm" name="them">
        </form>
</body>
<?php
    include "connect.php";
    if(isset($_POST['them'])&& ($_POST['them']=="Thêm"))
    {
        $tenkh = $_POST['hotenkh'];
        $soxe = $_POST['soxe'];
        $hangxe = $_POST['hangxe'];
        $namsx = $_POST['namsx'];

        $sql ="SELECT makh from khachhang where hotenkh ='$tenkh'";
        $res = $connect->query($sql);
        if($res->num_rows >0)
        {
            $row = $res->fetch_assoc();
            $makh = $row['makh'];

            $sql = "INSERT into xe values ('$soxe', '$hangxe','$namsx', '$makh')";
            if ($connect->query($sql)==true)
            {
                echo "Success";
            }
            else
            {
                echo "Failed" . $connect->error;
            }
        }
        $connect -> close();
    }
?>

</html>