<?php
    include "connect.php";
    $sql = "SELECT * FROM Chinhanh WHERE  MaCongTy='CT01'";
    // thực thi câu truy vấn và lưu kết quả vào biến $result.
    $result = $connect->query($sql);

    echo "<table border = '1' cellspacing ='0'>";
    echo "<tr>
            <th>STT</th>
            <th>Mã chi nhánh</th>
            <th>Tên chi nhánh</th>
          </tr>";
          $stt = 1;
          if ($result -> num_rows>0)
          {
            while ($row = $result->fetch_row())
            {
                echo "<tr>";
                    // 0: MaCN; 1: TenCN, ...
                    echo "<td>$stt</td>
                          <td>$row[0]</td>
                          <td>$row[1]</td>";
                echo "</tr";
                $stt++;
            }
          }
          else
          {
            echo "Không có dòng nào";
          }
          $connect->close();
?>