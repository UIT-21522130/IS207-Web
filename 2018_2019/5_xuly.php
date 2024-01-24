<?php
    include "connect.php";
    $num = $_POST['num'];
    $sql = "SELECT b.mabaihat, tenbaihat, count(b.mabaihat) slbh
            from playlist_baihat pb join baihat b
            on b.mabaihat = pb.mabaihat
            group by b.mabaihat, tenbaihat
            having count(b.mabaihat) >= '$num'
            order by slbh desc";
    $res = $connect->query($sql);
    echo $connect->error;
    if ($res->num_rows>0)
    {
        $i = 1;
        echo '<table>
                <tr>
                    <th>STT</th>
                    <th>Ten bai hat</th>
                    <th>So lan xuat hien trong playlist</th>
                </tr>
                ';
        while ($row =$res->fetch_assoc())
        {
            echo '<tr>';
                echo '<td>'.$i.'</td>';
                echo '<td>'.$row['tenbaihat'].'</td>';
                echo '<td>'.$row['slbh'].'</td>';
            echo '</tr>';
            $i++;
        }
        echo '</table>';
    }
?>