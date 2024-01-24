<?php
    include "connect.php";
    $tennn =$_POST['tennn'];

    $sql ="SELECT tenplaylist 
           from nguoinghe n join playlist p
           on n.mann = p.mann
           where tennn = '$tennn'";
    $res = $connect->query($sql);
    echo $connect->error;
    if($res->num_rows>0)
    {
        $i =1;
        echo "<table>
                <tr>
                    <th>STT</th>
                    <th>Ten playlist</th>
                    <th>Chuc nang</th>
                </tr> ";   
        while($row=$res ->fetch_assoc())
        {
            echo '<tr>';
                echo '<td>'.$i.'</td>';
                echo '<td id = "tenpl">'.$row['tenplaylist'].'<td>';
                echo '<td><input type = "button" class = "xoa" value="Xoa"</td>';
            echo '</tr>';
        }         
    }
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function()
    {
        $(document).on("click", ".xoa", function()
        {
            const button = $(this);
            var tenpl = button.closest("tr").find("#tenpl").text();
            var row = button.closest("tr");

            $.post("3_xoa.php",
                        {
                            tenpl: tenpl
                        }, 
                        function(data, status)
                        {
                            if(status=="success")
                            {
                                row.remove();
                            }
                        })
        })
    })
</script>