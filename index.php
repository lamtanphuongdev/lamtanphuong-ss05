<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public_flies/pmycss.css">
    <title>Trang sản phẩm hàng hoá tiêu dung giải trí</title>
</head>
<body>
    <div id="lvOne"></div>
    <div id="lvTwo">
        <?php
            require './apart/menuLoaihang.php';
        ?>
    </div>
    <div id="lvThree">
        <?php
            if(!isset($_GET['reqHanghoa'])){
                require './apart/viewListLoaihang.php';
            }else{
                require './apart/viewHangHoa.php';
            }
        ?>
    </div>
</body>
</html>