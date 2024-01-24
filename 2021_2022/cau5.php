<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div>Số điểm du lịch đi qua
        <input type="input" value="" class = "no-diemdl">
    </div>
    <div>Số điểm du lịch mà các tour đã đi qua</div>
    <table id="table">
        <tr>
            <th>STT</th>
            <th>Tên tour</th>
            <th>Số điểm du lịch</th>
        </tr>
    </table>
</body>
<script>
    $(document).ready(function() {
        $('.no-diemdl').keydown(function(event){
                var sodiemdl = $(".no-diemdl").val();
                var keycode = (event.keyCode ? event.keyCode : event.which);
                if (keycode == 9) {
                                $.post("so_diem_dl.php",
                                                    {
                                                        no_ddl:sodiemdl
                                                    },
                                                    function (data, status)
                                                    {
                                                        if(status == "success")
                                                        {                                                           
                                                            if(data!= "error")
                                                            {
                                                                $("#table").html(data)
                                                            }
                                                            else
                                                            {
                                                                alert("failed to remove")
                                                            }
                                                        }
                                                    }
                                                )   
                                }
            });
    })
</script>
</html>