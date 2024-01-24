<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div>Ngay sinh</div>
    <input type="date" id="date">
    <div>Danh sach cac ca si</div>
    <div id="table"></div>
</body>
<script>
    $(document).ready(function()
    {
        $(document).on("change", "#date", function()
        {
            var date = $(this).val();
            $.post ("2_xuly.php",
                                {
                                    date: date
                                },
                                function(data, status)
                                {
                                    if(status=="success")
                                    {
                                        $('#table').html(data)
                                    }
                                })
        })
    })
</script>
</html>