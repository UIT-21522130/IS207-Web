<?php
    include "connect.php";
    $date = $_POST['date'];
    $sql = "SELECT soxe from baoduong
            where ngaynhan = '$date'";
    $res = $connect->query($sql);
    echo $connect->error;
    if ($res->num_rows>0)
    {
        while ($row =$res->fetch_assoc())
        {
            echo '<option value="'.$row['soxe'].'" class="soxe">'.$row['soxe'].'</option>';
        }
    }
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function()
    {
        $(document).on("change", "#soxe", function()
        {
            var soxe = $(this).val();            
            $.post("4_info_bd.php",
                                {
                                    soxe:soxe
                                },
                                function(data, status)
                                {
                                if(status =="success")
                                {
                                    $('#table').html(data);
                                }
                            
                            })
            $.post("4_sum_tongtien.php",
                                {
                                    soxe:soxe
                                },
                                function(data, status)
                                {
                                if(status =="success")
                                {
                                    $('#tong').val(data);
                                }
                            
                            })
        })
    })
</script>
