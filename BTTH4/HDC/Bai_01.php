
<form action="#" method = "get">
    <table border = "1" cellspacing = "0">
        <tr><td colspan = "2">Thêm công ty</td></tr>
        <tr>
            <td>Mã công ty</td>
            <td><input type="input" name = 'mact'></td>
        </tr>
        <tr>
            <td>Tên công ty</td>
            <td><input type="input" name = 'tenct'></td>
        </tr><tr>
            <td>Địa chỉ</td>
            <td><input type="input" name = 'dc'></td>
        </tr>
        <tr>
            <td align="center"><input type="Submit" value="Thêm" name="Submit"></td>
            <td><input type="Reset" value="Reset"></td>
        </tr>
    </table>
</form>
<?php
    if (isset($_GET['Submit']) && ($_GET['Submit']=="Thêm"))
    {
        include "connect.php";
        $mact = $_GET['mact'];
        $tenct = $_GET['tenct'];
        $dc = $_GET['dc'];
        $str = "INSERT INTO CONGTY values ('$mact', '$tenct', '$dc')";
        if ($connect->query($str)==true)
        {
            echo "Them thành công";
        }
        else
        {
            echo "Thêm không thành công";
        }
        $connect->close();
    }
?>
