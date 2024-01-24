<?php
    include "connect.php";
    $date = $_POST['date'];
    $sql = "SELECT tencasi from casi 
            where namsinh ='$date'";
    $res = $connect->query($sql);
    if($res->num_rows>0)
    {
        $i=1;
        echo "<table>
                <tr>
                    <th>STT</th>
                    <th>Ten ca si</th>
                </tr>
              ";
        while($row=$res->fetch_assoc())
        {
            echo '<tr>';
                echo '<td>' . $i . '</td>';
                echo '<td>' . $row['tencasi'] . '</td>';
            echo '</tr>';
            $i++;
        }
        echo '</table>';
    }
?>