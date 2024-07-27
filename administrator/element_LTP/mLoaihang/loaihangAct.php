<?php
require '../../element_LTP/mod/loaihangCls.php';
// nếu có biến yêu cầu và đúng tên biến thì cho vô còn không đẩy về index.php ngăn truy cập không mục đích rõ ràng
if (isset($_GET['reqact'])) {
    $requestAction = $_GET['reqact'];
    switch ($requestAction) {
        case 'addnew': // thêm mới
            //xử lý thêm mới
            //nhận dữ liệu
            $tenloaihang = $_REQUEST['tenloaihang'];
            $mota = $_REQUEST['mota'];
            $hinhanh_file = $_FILES['fileimage']['tmp_name']; // hổng lẽ phải gõ đúng chữ fileimage??
            //encode MT 2 chiều về thành MT 1 chiều
            $hinhanh = base64_encode(file_get_contents(addslashes($hinhanh_file)));
            //kiểm thử dữ liệu đã nhận đủ không?
            //   echo $tenloaihang . '<br/>';
            //   echo $mota . '<br/>';
            //   echo $hinhanh . '<br/>';
            //ok
            // khởi tạo đối tượng và thực hiện thêm dữ liệu
            $lh = new loaihang();
            $kq = $lh->LoaihangAdd($tenloaihang, $hinhanh, $mota);
            if ($kq) {
                header('location: ../../index.php?req=loaihangview&result=ok');
            } else {
                header('location: ../../index.php?req=loaihangview&result=notok');
            }
            break;
        case 'deleteloaihang':
            //nhận dữ liệu gửi về và kiểm thử
            $idloaihang = $_REQUEST['idloaihang'];
            //echo $idloaihang;
            //khởi tạo đối tượng và thực hiện chức năng xoá
            $lh = new loaihang();
            $kq = $lh->LoaihangDelete($idloaihang);
            // trả kết quả
            if ($kq) {
                header('location: ../../index.php?req=loaihangview&result=ok');
            } else {
                header('location: ../../index.php?req=loaihangview&result=notok');
            }
            break;

        case 'updateloaihang': // update loai hang
            //nhận dữ liệu và kiểm thử
            $idloaihang = $_REQUEST['idloaihang'];
            $tenloaihang = $_REQUEST['tenloaihang'];
            $mota = $_REQUEST['mota'];

            // echo file_exists($_FILES['fileimage']['tmp_name']);
            //kiểm tra xem có thay đổi hình ảnh hay không?
            if (file_exists($_FILES['fileimage']['tmp_name'])) {
                $hinhanh_file = $_FILES['fileimage']['tmp_name']; // hổng lẽ phải gõ đúng chữ fileimage??
                //encode MT 2 chiều về thành MT 1 chiều
                $hinhanh = base64_encode(file_get_contents(addslashes($hinhanh_file)));
            } else {
                $hinhanh = $_REQUEST['hinhanh'];
            }
            //kiểm thử dữ liệu đã nhận đủ không?
            // echo $idloaihang . '<br/>';
            // echo $tenloaihang . '<br/>';
            // echo $mota . '<br/>';
            // echo $hinhanh . '<br/>';
            //ok dữ liệu
            // tạo đối tượng và thực hiện update sau đó xử lý kết quả trả về
            $lh = new loaihang();
            $kq = $lh->LoaihangUpdate($tenloaihang,$hinhanh,$mota,$idloaihang);
             if($kq){
                header('location: ../../index.php?req=loaihangview&result=ok');
            }else{
                header('location: ../../index.php?req=loaihangview&result=notok');
            }
            break;
        default:
            // dành cho trường hợp không gán thí đại giá trị nào đó không trong cấu trúc xử lý --> truy cập không hợp lệ
            header('location: ../../index.php?req=loaihangview');
            break;
    }
} else {
    //nhảy lại địa chỉ index.php    
    header('location: ../../index.php?req=loaihangview');
}
