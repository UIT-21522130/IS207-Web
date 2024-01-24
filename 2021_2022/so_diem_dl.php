<?php
    include "connect.php";
    // $tentour = $_POST['tentour'];
    $no_ddl = $_POST['no_ddl'];

    $sql = "SELECT distinct(tentour), count(DISTINCT maddl) AS count_ddl  
            FROM chitiet c join tour t on c.matour = t.matour
            Group by c.matour
            HAVING COUNT(maddl)>= $no_ddl";
    $result = $connect->query($sql);
    echo $connect->error;
    if ($result->num_rows > 0) {{
        $i =1;
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' .$i. '</td>';
            echo '<td class="tentour">' .$row['tentour']. '</td>';
            echo '<td class="no_ddl">' . $row['count_ddl'] . '</td>';
            echo '</tr>';
            $i++;

        }
    }}
?>