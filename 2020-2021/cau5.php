<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div>Chọn số lần bảo dưỡng</div>
    <input type="input" class= "num">
    <div class = "table"></div>

    <script>
        $(document).ready(function()
        {
            $('.num').keydown(function(event)
            {
                var number = $(this).val();
                var keycode = (event.keyCode ? event.keyCode : event.which );
                if (keycode == 13)
                {
                    $.post("num_bd.php",                    
                                        {
                                            number: number
                                        },
                                        function(data, status)
                                        {
                                            if (status=="success")
                                            {
                                                if (data!="error")
                                                {
                                                    $('.table').html(data);
                                                }
                                                else
                                                {
                                                    alert('failed');
                                                }
                                            }
                                        })
                }
            })
        })
    </script>
</body>
</html>