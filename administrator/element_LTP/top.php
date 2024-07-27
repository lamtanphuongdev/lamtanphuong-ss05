<?php
    if(isset($_SESSION['USER'])){
        $namelogin = $_SESSION['USER'];
    }

    if(isset($_SESSION['ADMIN'])){
        $namelogin = $_SESSION['ADMIN'];
    }

    if(isset($_COOKIE[$namelogin])){
        echo "Xin chào " . $namelogin . '<br/>';
        echo "Lần đăng nhập gần nhất: " . $_COOKIE[$namelogin];
    }
// xử lý kết quả trả về của biến result
    echo '<br/>';
    if(isset($_GET['result'])){
        if($_GET['result'] == 'ok'){
            ?>
             <img src="img_LTP/success.webp" height="50px">
            <?php
        }else{
            ?>
            <img src="img_LTP/fail.png" height="50px">
           <?php
        }
    }else{
        ?>
        <img src="img_LTP/wait.png" height="50px">
        <?php
    }
    