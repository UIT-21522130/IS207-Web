<form action="#" method = "get">
    <table border = "1" cellspacing = "0">
        <tr>
            <td>Tên cần tìm</td>
            <td><input type="input" name = "ten"></td>
        </tr>
        <tr>
            <td colspan ="2" align="center">
                <input type="Submit" value ="Tìm" name ="Submit">
            </td>
        </tr>
    </table>
</form>
<?php
    if (isset($_GET['Submit']) && ($_GET['Submit']=="Tìm"))
    {
        include "connect.php";
        $tennv = $_GET['ten'];
        $str = "SELECT * from nhanvien where tennhanvien ='$tennv'";
        $result = $connect->query($str);
        if ($result->num_rows>0)
        {
            $row = $result->fetch_row();
            echo "<h3>Mã nhân viên tìm thấy: $row[0]</h3>";
            echo "<h3>Tên nhân viên tìm thấy: $row[1]</h3>";
        }
        else
        {
            echo "không tìm thấy!!!";
        }
        $connect->close();
    }
?>