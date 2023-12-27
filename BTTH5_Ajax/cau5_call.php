<?php
    include "connect.php";
    session_start();
    $totalMoneyProducts = 0;
    $html = "";

    if (isset($_SESSION['my_cart']) && is_array($_SESSION['my_cart']) && count($_SESSION['my_cart']) > 0)
    {
        foreach($_SESSION['my_cart'] as $key => $value)
        {
            $row = $conn->query("SELECT * from sanpham where masp = '$key'")->fetch_row();

            $totalMoney = $row[4]*$value['productQnt'];
            $totalMoneyProducts +=$totalMoney;
            $html .="
                <tr>
                    <td>
                        <image src = '$row[5]'>
                        <span>$row[1]</span>
                    </td>
                    <td>$row[4]</td>
                    <td>
                        <input min = '1' masp='key' type ='number' value ='$value[productQnt]'>
                    </td.
                    <td>$totalMoney</td>
                    <td><button masp='$key'>Xóa</button></td>
                </tr>
            ";
        }
    }
    $html .="|".$totalMoneyProducts;
    echo($html);
?>