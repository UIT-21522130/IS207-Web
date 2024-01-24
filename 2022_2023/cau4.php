<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div>Số lượng khách hàng
        <input type="input" class="max-kh">
    </div>
    <div class="table"></div>
</body>
<script>
    $(document).ready(function() {
        $('.max-kh').keydown(function(event){
                var maxkh = $(".max-kh").val();
                var keycode = (event.keyCode ? event.keyCode : event.which);
                if (keycode == 13) {
                    $.post("max_kh.php",
                                            {
                                                max_kh : maxkh
                                            },
                                            function (data, status)
                                            {
                                                if(status == "success")
                                                {                                                           
                                                    if(data!= "error")
                                                    {
                                                        $(".table").html(data)
                                                    }
                                                    else
                                                    {
                                                        alert("failed to remove")
                                                    }
                                                }
                                            }
                            )      
                }
            })
        })
</script>
</html>