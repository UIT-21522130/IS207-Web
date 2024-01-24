<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<body>
    <div>Số xe
    <input type="input" id = "soxe">
    </div>
    <div>Họ tên khách hàng
        <div id ="hoten"></div>
    </div>
    <div>Mã bảo dưỡng</div>
    <input type="input" id ="mabd">
    <div>Số km</div>
    <input type="input" id ="sokm">
    <div>Nội dung</div>
    <input type="input" id ="nd">
    <input type="submit" name="them" value="Thêm" id="them">
</body>
<script>
    $(document).ready(function()
    {
        $(document).on("change", "#soxe", function()
        {
            var soxe = $(this).val();

            $.post("soxe_change.php",
                                    {
                                        soxe: soxe
                                    },
                                    function(data, status)
                                    {
                                        if(status === "success")
                                        {
                                            $("#hoten").html(data)
                                        }

                                    }
            )
        })
    })
    $(document).ready(function()
    {
        $(document).on("click", "#them", function()
        {
            var soxe = $('#soxe').val();
            var mabd = $('#mabd').val();
            var sokm = $('#sokm').val();
            var nd = $('#nd').val();

            $.post("insert_bd.php",
                                  {
                                    soxe: soxe,
                                    mabd: mabd,
                                    sokm: sokm,
                                    nd: nd
                                  }, 
                                  function (data, status)
                                  {
                                    if(status =="success")
                                    {
                                        alert("success");
                                    }
                                    else
                                    {
                                        alert("failed");
                                    }
                                  })
        })
    })
</script>
</html>