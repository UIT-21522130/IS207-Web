<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="get" action="#">
        Nhập tên cần tìm <input type="text" name="tencantim"><br><br>
        <input type="Submit" name="Tim" value="Search">
    </form>
    <?php
        function InMang($array)
        {
            foreach ($array as $ten => $tuoi)
            {
                echo $ten . "\t" . $tuoi . " tuổi<br>";
            }
        }

        function TimTen($array, $str)
        {
            foreach ($array as $ten => $tuoi)
            {
                if ($ten == $str)
                {
                    return $tuoi;
                }
            }
            return false;
        }

        $ban = array("Tuấn" => 21, "Tú" => 19, "Tâm" => 22, "Tùng" => 20);

        if (isset($_GET['Tim']) && ($_GET['Tim'] == "Search"))
        {
            $ten = $_GET['tencantim'];
            $tuoi = TimTen($ban, $ten);
            if ($tuoi !== false)
            {
                echo "Tìm thấy " . $ten . " " . $tuoi . " tuổi trong mảng<br>";
            }
            else
            {
                echo "Không tìm thấy " . $ten . " trong mảng<br>";
            }
            echo "<h3>Xuất mảng</h3>";
            InMang($ban);
        }
    ?>
</body>
</html>