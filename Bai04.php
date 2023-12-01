<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="get" action="#">
        <table>
            <tr>
                <td>Chiều dài</td>
                <td>
                    <input type="input" name="chieudai"><br><br>
                </td>
            </tr>   
            <tr>
                <td>Chiều rộng</td>
                <td>
                    <input type="input" name="chieurong"><br><br>
                </td>
            </tr> 
            <tr>
                <td colspan="2">
                    <input type="Submit" value="Tính" name="Submit"><br><br>
                </td>
            </tr>           
        </table>
    </form>
    <?php
        if (isset($_GET['Submit'])&&($_GET['Submit']=='Tính'))
        {
            $dai = (float)$_GET['chieudai'];
            $rong = (float)$_GET['chieurong'];
            include "HinhChuNhat.php";
            $h1 = new HinhChuNhat($dai, $rong);
            $dientich = $h1->DienTich();
            $chuvi = $h1->ChuVi();

            echo "Diện tích:".$dientich."<br>";
            echo "Chu vi:".$chuvi."<br>";
        }
    ?>
</body>
</html>