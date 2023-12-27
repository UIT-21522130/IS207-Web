<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <div>Tên thành phố</div>
        <select name="tenttp">
            <?php
                include "connect.php";
                $query = "SELECT tenttp from tinhtp";
                $result = $connect->query($query);
                if($result->num_rows > 0)
                {
                    while ($row = $result->fetch_assoc())
                    {
                        echo '<option value ="'.$row['tenttp'].'">' .$row['tenttp'].'</option>';
                    }
                }
            ?>
        </select>
        <div>Mã điểm du lịch</div>
        <input type="input" name="maddl" >
        <div>Tên điểm du lịch</div>
        <input type="input" name="tenddl" >
        <div>Đặc trưng</div>
        <input type="input" name="dactrung" >
        <input type="submit" name="them" value="Thêm">
    </form>
    <?php
        include "connect.php";
        if (isset($_POST['them'])&&($_POST['them']=="Thêm"))
        {
            $tenttp = $_POST['tenttp'];
            $maddl = $_POST['maddl'];
            $tenddl = $_POST['tenddl'];
            $dactrung = $_POST['dactrung'];

            $query = "SELECT mattp from tinhtp where tenttp = '$tenttp'";
            $result = $connect->query($query);
            if ($result->num_rows>0)
            {
                $row = $result->fetch_assoc();
                $mattp=$row['mattp'];

                $sql = "INSERT into diemdl values ('$maddl', '$tenddl', '$mattp', '$dactrung')";
                if($connect->query($sql)===true)
                {
                    echo "Tham thanh cong";
                }
                else
                {
                    echo "Loi" .$connect->error;
                }
            }
            $connect->close();
        }
    ?>
</body>
</html>