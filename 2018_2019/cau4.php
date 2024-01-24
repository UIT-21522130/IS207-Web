<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div id = "all">Danh sach ca si hat tat ca bai hat
        <?php
        include "connect.php";
        $sql = "SELECT tencasi from casi c
                where not exists
                                (SELECT mabaihat from baihat b
                                where not exists
                                            (SELECT * 
                                            from casi_baihat cb
                                            where cb.macasi = c.macasi 
                                            and cb.mabaihat = b.mabaihat
                                            ))";
            $res = $connect->query($sql);
            echo $connect->error;
            if ($res->num_rows>0)
            {
                $i=1;
                echo '<table border = "1">';
                echo '<tr>
                        <th>STT</th>
                        <th>Ten ca si</th>
                      </tr>';
                while ($row =$res->fetch_assoc())
                {
                    echo '<tr>';
                        echo '<td>'.$i.'</td>';
                        echo '<td>'.$row['tencasi'].'</td>';
                    echo '</tr>';
                    $i++;
                }
                echo '</table';
            }
        ?>
    </div>
</body>

</html>