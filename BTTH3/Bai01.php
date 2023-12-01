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
        if(isset($_GET['Submit'])&&($_GET['Submit']=="Tính"))
        {
            $dai = $_GET["chieudai"];
            $rong = $_GET["chieurong"];
            $dientich = (float)$dai * (float)$rong;
            $chuvi = ((float)$dai + (float)$rong)*2;
            echo "Diện tích: ".$dientich."<br>";
            echo "Chu vi: ".$chuvi;
        }
    ?>
</body>
</html>