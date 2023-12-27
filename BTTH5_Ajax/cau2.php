<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #giohang {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 10px;
            border-radius: 50%;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#sp") .change (function ()
            {
                const typeProduct = $(this).val();
                $.get('cau2_call.php',
                        {typeProduct : typeProduct},
                        function(data, status)
                        {
                            if (status == "success")
                            {
                                $("#kq").html(data);
                            }
                        });
            });
        });
        $(document).on("click", ".product_btn-add", function ()
        {
            const productId = $(this).attr("masp");
            const productQnt = $(this).parent().children(".product_qnt-input").val();
            
            $.get('cau5_sl.php',
                    {
                        productId: productId,
                        productQnt: productQnt
                    },
                    function(data, status)
                    {
                        if (status == "success") 
                        {
                            $(".main__cart-qnt").html(data);
                        }
                    })
        });
    </script>
</head>
<body>
    <div class="main">
        <select name="" id="sp">
            <option value="">Chọn sản phẩm</option>
            <option value="all">Chọn tất cả sản phẩm</option>
            <option value="but">Sản phẩm bút</option>
            <option value="phan">Sản phẩm phấn</option>
            <option value="bang">Sản phẩm bảng</option>
            <option value="tap">Sản phẩm tập</option>
        </select>
    </div>
    <div id = "kq"></div>
    <a href="cau5.html" id = "cart">Giỏ hàng  
        <span id= "sl_cart">0</span>
    </a>

</body>
</html>