<?php
    include "connect.php";
    $soxe = $_POST['soxe'];

    $sql = "SELECT tencv, dongia 
            from congviec c, ct_bd ct, baoduong b
            where c.macv = ct.macv and b.mabd = ct.mabd
                and soxe = '$soxe'";
    $res = $connect->query($sql);
    if($res ->num_rows>0)
    {
        // echo '<div id="tong">Thành tiền</div>';
        echo '<table border ="1">';
        echo '<th>Tên công việc</th>';
        echo '<th>Đơn giá</th>';
        echo '<th>Chức năng</th>';
        while ($row = $res->fetch_assoc()) {
            echo '<tr>';
            echo '<td class = "tencv">' .$row['tencv']. '</td>';
            echo '<td class ="dongia">' . $row['dongia'] . '</td>';
            echo '<td><input type="button" class="xoa" value="Xóa"></td>';
            echo '</tr>';
        }
        echo '</table>';
    }
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function()
    {
        $(document).on("click", ".xoa", function()
        {
            const button = $(this);
            var tencv = button.closest("tr").find(".tencv").text();
            var row = button.closest("tr");

            $.post("4_xoa.php",
                            {
                                tencv: tencv,
                            },
                            function(data, status)
                            {
                                if (status == "success")
                                {      
                                    row.remove();                                    
                                }
                            })
            $.post("4_sum_tongtien.php",
                                {
                                    tencv:tencv
                                },
                                function(data, status)
                                {
                                if(status =="success")
                                {
                                    $('#tong').html(data);
                                }
                            
                            })
        })
        
    })
</script>