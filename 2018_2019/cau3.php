<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div>Ten nguoi nghe</div>
    <select id = "tennn">
        <?php
            include "connect.php";
            $sql ="SELECT tennn from nguoinghe";
            $res = $connect->query($sql);
            echo $connect->error;
            if($res->num_rows>0)
            {   
                while($row=$res ->fetch_assoc())
                {
                    echo '<option value = "'.$row['tennn'].'">'.$row['tennn'].'</option>';
                }                   
            }
        ?>
    </select>
    <div id="table"></div>
</body>
<script>
    $(document).ready(function()
    {
        $(document).on("change", "#tennn", function()
        {
            var tennn = $(this).val();
            $.post("3_xuly.php",
                                {
                                    tennn: tennn
                                },
                                function(data, status)
                                {
                                    if(status =="success")
                                    {
                                        $("#table").html(data);
                                    }
                                })
        })
    })
</script>
</html>