<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div>Nhap so luong bai hat</div>
    <input type = "input" id = "num"></div>
    <div id='table'></div>
</body>
<script>
    $(document).ready(function()
    {
        $('#num').keydown(function(event)
        {
            var num = $(this).val();
            var keycode = (event.keyCode ? event.keyCode:event.which);
            if(keycode == 9)
            {
                $.post("5_xuly.php",
                                {
                                    num: num
                                },
                                function(data, status)
                                {
                                    if (status=="success")
                                        {
                                            if (data!="error")
                                            {
                                                $('#table').html(data);
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
</html>