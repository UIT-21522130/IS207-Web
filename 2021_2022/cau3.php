<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <table border="1" id = "table1">
        <tr>
            <th>STT</th>
            <th>Mã điểm du lịch</th>
            <th>Tên điểm du lịch</th>
            <th>Tên thành phố</th>
            <th>Đặc trưng</th>
            <th>Chức năng</th>
        </tr>
        <tr>
            <?php
                include "connect.php";
                // $query = "SELECT maddl, tenddl, tenttp, dactrung 
                $query = "SELECT * 
                from diemdl d join tinhtp t on d.mattp = t.mattp";
                $result = $connect->query($query);
                if ($result->num_rows > 0)
                {
                    $i =1;
                    while($row = $result->fetch_assoc())
                    {
                        echo '<tr>';
                        echo '<td>'.$i.'</td>';
                        echo '<td class="maddl">'.$row['maddl'].'</td>';
                        echo '<td class="tenddl">'.$row['tenddl'].'</td>';
                        echo '<td class="tenttp">'.$row['tenttp'].'</td>';
                        echo '<td class="feature">'.$row['dactrung'].'</td>';
                        echo '<td><input type="button" class="view" value="View">
                                <input type="button" class="xoa" value="Delete">
                              </td>';
                        echo '</tr>';
                        $i++;
                    }
                }
            ?>
        </tr>
    </table>
    <div id ="view-ddl"></div>

    <script>
        $(document).ready(function()
        {
            $(document).on("click", ".xoa", function()
            {
                const button = $(this)
                      maddl = $(this).closest("tr").find(".maddl").text();
                      tenddl = $(this).closest("tr").find(".tenddl").text();
                      tenttp = $(this).closest("tr").find(".tenttp").text();
                      feature = $(this).closest("tr").find(".feature").text();
                var row = button.closest("tr");

                $.post("remove_ddl.php",
                                    {
                                        maddl: maddl,
                                        tenddl: tenddl,
                                        tenttp: tenttp,
                                        dactrung: feature
                                    },
                                    function (data, status)
                                    {
                                        if(status == "success")
                                        {
                                            // ****** khi nào xóa trên xóa dưới như đề 2023 r uncmt dòng dài
                                            // if($('#table1 td.maddl:contains(' + maddl +')').length ===0)
                                            if(data!= "error")
                                            {
                                                row.remove();
                                            }
                                            else
                                            {
                                                alert("fialed to remove")
                                            }
                                        }
                                    }
                                  )   
            })
        })
        
    </script>  
    <script>
        $(document).ready(function()
        {
            $(document).on("click", ".view", function()
            {
                const button = $(this);
                      maddl = $(this).closest("tr").find(".maddl").text();
                      tenddl = $(this).closest("tr").find(".tenddl").text();
                      tenttp = $(this).closest("tr").find(".tenttp").text();
                      feature = $(this).closest("tr").find(".feature").text();
                var row = button.closest("tr");

                $.post("view_ddl.php",
                                    {
                                        maddl: maddl,
                                        tenddl: tenddl,
                                        tenttp: tenttp,
                                        dactrung: feature
                                    },
                                    function (data, status)
                                    {
                                        if (status == "success") {
                                            if (data != "error") {
                                                $('#view-ddl').html(data); // Chèn nội dung phản hồi vào phần tử có id "view_ddl"
                                            } 
                                            // else {
                                            //     alert("Failed to update");
                                            // }
                                        } else {
                                            alert("Request failed");
                                        }
                                    }
                                  )   
            })
        })
    </script>
</body>
</html>