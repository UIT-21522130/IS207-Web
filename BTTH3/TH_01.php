<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="#" method = "get">
        <table align="center">
            <tr>
                <td>Hệ số a</td>
                <td><input type="input" name = "a"></td>
            </tr>
            <tr>
                <td>Hệ số b</td>
                <td><input type="input" name = "b"></td>
            </tr><tr>
                <td>Hệ số c</td>
                <td><input type="input" name = "c"></td>
            </tr>
            <tr>
                <td colspan ="2">
                    <input type="Submit" value="Giải" name = "Submit">
                </td>
            </tr>
        </table>
    </form>
    <?php
        if (isset($_GET['Submit'])&& ($_GET['Submit']=="Giải"))
        {
            $a = $_GET['a'];
            $b = $_GET['b'];
            $c = $_GET['c'];
            $delta = $b*$b - 4*$a*$c;

            if ($a == 0 && $b !=0 )
            {
                $x = (-$c)/$b;
                echo "Phương trình có một nghiệm duy nhất: ".$x;
            }
            elseif ($a ==0 && $b == 0 && $c !=0)
            {
                echo "Phương trình vô nghiệm";
            }
            elseif ($a ==0 && $b == 0 && $c == 0)
            {
                echo "Phương trình có vô số nghiệm";
            }
            else
            {
                if ($delta > 0)
                {
                    $x1 = (-$b + sqrt($delta))/(2*$a);
                    $x2 = (-$b - sqrt($delta))/(2*$a);
                    echo "Phương trình có 2 nghiệm phân biệt: x1 = ".$x1."<br>"."x2 = ".$x2;
                }
                elseif ($delta == 0)
                {
                    $x = (-$b)/(2*$a);
                    echo "Phương trình có nghiệm kép: x1 = x2 = ".$x;
                }
                else 
                {
                    echo "Phương trình vô nghiệm";
                }
            }
        }
    ?>
</body>
</html>