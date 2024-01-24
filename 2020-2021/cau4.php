<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div>Số xe</div>
    <select name="" id="soxe">
    </select>
    <div>Ngày nhận xe <input type="date" id="date"></input></div>
    <div>Thành tiền <input id ="tong"></div>
    <div id ="table"></div>
    <input type="button" value="Thanh toán" id="thanhtoan">
</body>
<script>    
    $(document).ready(function()
    {
        $(document).on("change", "#date", function()
        {
            var date = $(this).val();
        $.post("4_insert_soxe.php",
                                      {
                                        date: date
                                      },
                                      function(data, status)
                                      {
                                        if(status =="success")
                                        {
                                            $('#soxe').html(data);
                                        }
                                      })
        })
        $(document).on("click", "#thanhtoan", function()
        {
            var soxe = $('#soxe').val();
            var tong = $('#tong').val();
            $.post("4_thanhtoan.php",
                                {
                                    tong:tong,
                                    soxe:soxe
                                },
                                function(data, status)
                                {
                                if(status =="success")
                                {
                                    alert('success')
                                }
                            
                            })
        })
    })
</script>


</html>