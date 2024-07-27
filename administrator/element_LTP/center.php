<?php
if (isset($_GET['req'])) {
    $request = $_GET['req'];
    switch ($request) {
        case 'userview':
            require './element_LTP/mUser/userView.php';
            break;
        case 'updateuser':
            require './element_LTP/mUser/userUpdate.php';
            break;
            //loại hàng    
        case 'loaihangview':
            require './element_LTP/mLoaihang/loaihangView.php';
            break;
            //hàng hoá    
        case 'hanghoaview':
            require './element_LTP/mHanghoa/hanghoaView.php';
            break;
    }
} else {
    require './element_LTP/default.php';
}
