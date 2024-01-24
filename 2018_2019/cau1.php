<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method= "post">
        <div>Ma bai hat</div>
        <input type="input" name ="mabh">
        <div>Ten bai hat</div>
        <input type="input" name ="tenbh">
        <div>The loai</div>
        <input type="input" name ="theloai">
        <input type="submit" name = "them" value="Them">
    </form>
    <?php
        include "connect.php";
        if(isset($_POST['them'])&&($_POST['them']=="Them"))
        {
            $mabh = $_POST['mabh'];
            $tenbh = $_POST['tenbh'];
            $tl = $_POST['theloai'];

            $sql = "INSERT into baihat value ('$mabh', '$tenbh', '$tl')";
            if ($connect->query($sql)==true)
            {
                echo "Success";
            }
            else
            {
                echo "failed";
            }
            $connect->close();
        }
    ?>
</body>
</html>