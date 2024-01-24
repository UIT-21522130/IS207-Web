<body>
    <table border = "1">
        <tr>
            <th>STT</th>
            <th>Tên công dân</th>
            <th>Giới tính</th>
            <th>Năm sinh</th>
            <th>Nước về</th>
            <th>Chức năng</th>
        </tr>
        <tr>
            <?php
                include "connect.php";
                $sql = "SELECT * from congdan";
                $res = $connect->query($sql);
                if($res->num_rows>0)
                {
                    $i =1;
                    while($row = $res->fetch_assoc())
                    {
                        echo "<tr>";
                        echo '<td>'.$i.'</td>';
                        echo '<td class = "tencd">'.$row['tencongdan'].'</td>';
                        echo '<td class = "gt">'.$row['gioitinh'].'</td>';
                        echo '<td class = "ns">'.$row['namsinh'].'</td>';
                        echo '<td class = "nv">'.$row['nuocve'].'</td>';
                        echo '<td><input type="button" class = "view" value="View">';
                        echo '<input type="button" class = "xoa" value="Delete"></td>';
                        $i++;
                        echo"</tr>";
                    }
                }
            ?>
        </tr>
    </table>
    <div class = "cau4"></div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- -------------------------Câu 4------------------------------ -->
<script>
    $(document).ready(function()
    {
        $(document).on("click", ".view", function()
        {
            var tencd = $(this).closest("tr").find(".tencd").text();
            var gt = $(this).closest("tr").find(".gioitinh").text();
            var ns = $(this).closest("tr").find(".namsinh").text();
            var nv = $(this).closest("tr").find(".nuocve").text();

            $.post("view_cd.php",
                                {
                                    tencd: tencd
                                },
                                function(data, status)
                                {
                                    if(status)
                                    {
                                        if(data !="error")
                                        {
                                            $(".cau4").html(data)
                                        }
                                    }
                                })
        })
    })
</script>