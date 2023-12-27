<?php
    $servername = "localhost";
    $username = "root";
    $password ="";
    $DBName = "qlsp";

    $conn = mysqli_connect($servername, $username, $password, $DBName)
            Or die("<p> Khong th connect</p>". "<p>Error code: " .mysqli_connect_errno().":" . mysqli_connect_error()."</p>");
    mysqli_set_charset($conn, "utf8");
    // INSERT ẢNH
    // if (isset($_POST['submit'])) {
    //     $image = $_FILES['image']['tmp_name'];
    //     $imageData = addslashes(file_get_contents($image));
        
    //     $sql = "INSERT INTO images (image_data) VALUES ('$imageData')";
        
    //     if (mysqli_query($conn, $sql)) {
    //         echo "Image inserted successfully.";
    //     } else {
    //         echo "Error inserting image: " . mysqli_error($conn);
    //     }
    // }
    ///////////////////////////////CÂU 2
    $typeProduct = $_GET['typeProduct'];
    if ($typeProduct == 'all')
    {
        $str = "SELECT * FROM sanpham";
    }
    else
    {
        $str = "SELECT * FROM sanpham where loaisp = '$typeProduct'";
    }
    $row = $conn->query($str);
    $result = mysqli_query($conn, $str);
    while($row = $result->fetch_row())
    {
        echo "
            <div class = 'product'>
                <div class = 'product_img'>
                    <img src = '$row[5]'>
                </div>
                <div class = 'product_info'>
                    <span>$row[1]</span>
                    <span>Đơn vị tính: $row[2]</span>
                    <span>Giá: $row[4]</span>
                </div>
                <div class = 'product_qnt'>
                    <span>Số lượng: </span>
                    <input class = 'product_qnt-input' type = 'number' value ='1'>
                    <button masp = '$row[0]' class = 'product_btn-add'>Chọn mua</button>
                </div>
            </div>
        ";
    }
    
?>