<?php
    include "connect.php";
    $tencd = $_POST['tencd'];
    $sql ="SELECT * from congdan c join diemcachly d
           on c.madiemcachly = d.madiemcachly
           where tencongdan = '$tencd'";
    $res = $connect->query($sql);
    if($res->num_rows>0)
    {
        while($row =$res->fetch_assoc())
        {
            echo '<div>Mã công dân
                        <input type ="input" id="macd" value="'.$row['macongdan'].'"></div>';
            echo '<div>Tên công dân
                        <input type ="input" id="tencd" value="'.$row['tencongdan'].'"></div>';
            $gtValue = $row['gioitinh'] === "1" ? 'checked="checked"' : '';
            echo '<div>Giới tính
                            <input type="checkbox" id="gt" '.$gtValue.'></div>
                            <i>Chọn tương ứng giới tính là Nam</i>';
            echo '<div>Năm sinh
                        <input type ="date" id="ns" value="'.$row['namsinh'].'"></div>';
            echo '<div>Nước về
                        <input type ="input" id="nv" value="'.$row['nuocve'].'"></div>';
            echo '<div>Tên địa điểm cách ly
                  <select id = "madcl">
                        <option value="'.$row['madiemcachly'].'">'.$row['tendiemcachly'].'
                  </select>
                  </div>';
            echo '<input type="button" id = "update" value ="Update">';
        }
        $res->close();
    }
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function(){
        $(document).on("click", "#update", function(event){
            event.preventDefault();
            var macd = $("#macd").val();
            var tencd = $("#tencd").val();
            var gt = $("#gt").is(":checked") ? "1" : "0";
            var ns = $("#ns").val();
            var nv = $("#nv").val();
            var madcl = $("#madcl").val();

            $.post("update_cd.php",
                                {
                                    macd:macd,
                                    tencd: tencd,
                                    gt: gt,
                                    ns: ns,
                                    nv:nv,
                                    tendcl:madcl
                                }, function(data, status)
                                {
                                    if(status)
                                    {
                                        if(data !="error")
                                        {
                                            alert("success");
                                        }
                                    }
                                })
        })
    })
</script>