<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function()
        {
            $("#submit").click(function()
            {
                const productid = $("#id").val();
                          productname = $("#name").val();
                          nuocsx = $("#nuocsx").val();
                          dvt = $("#dvt").val();
                          gia = $("#gia").val();
                          loaisp = $("#loaisp").val();
                          hinhanh = $("#hinhanh").val();
                $.post("cau3_call.php",
                                      {
                                        idproduct: productid,
                                        name: productname,
                                        nuocsx: nuocsx,
                                        dvt: dvt,
                                        gia: gia,
                                        loaisp: loaisp,
                                        hinhanh: hinhanh
                                      }, function(data, status)
                                        {
                                            if (status == "success")
                                            {
                                                alert(data);
                                            }
                                                
                                        });
            });
        });
    </script>
</head>
<body>
    <form action="" method = "post">
        <h1>Thêm sản phẩm</h1>
        <h3>Mã sản phẩm</h3>
        <input type="input" id = "id">
        <h3>Tên sản phẩm</h3>
        <input type="input" id = "name">
        <h3>Nước sản xuất</h3>
        <input type="input" id = "nuocsx">
        <h3>Đơn vị tính</h3>
        <input type="input" id = "dvt">
        <h3>Giá</h3>
        <input type="input" id = "gia">
        <h3>Loại sản phẩm</h3>
        <input type="input" id = "loaisp">
        <h3>Hình ảnh</h3>
        <input type="input" id = "hinhanh"><br><br>
        <input id = "submit" type = "button" value = "Thêm"></input>
        <input name = "reset" type = "reset" value = "Reset"></input>
    </form>
</body>
</html>