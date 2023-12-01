<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="#" method = 'get'>
        Chiều dài: <input type="input" name="chieudai"><br><br>
        Chiều rộng:<input type = 'input' name="chieurong"><br><br>
        Chiều cao:<input type = 'input' name="chieucao"><br><br>
        <input type="Submit" name="Submit" value ="Tính">
    </form>
    <?php
        if (isset($_GET['Submit'])&& ($_GET['Submit']=="Tính"))
        {
            $dai = (float)$_GET['chieudai'];
            $rong = (float)$_GET['chieurong'];
            $cao = (float)$_GET['chieucao'];
            include "HinhLapPhuong.php";
            $h1 = new HinhLapPhuong($dai, $rong, $cao);
            $dientich = $h1->DienTich();
            $thetich = $h1->TheTich();

            echo "Diện tích:".$dientich."<br>";
            echo "Thể tích:".$thetich."<br>";

        }
    ?>
</body>
</html>