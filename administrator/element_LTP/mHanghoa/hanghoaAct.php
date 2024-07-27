<?php
require '../../element_LTP/mod/hanghoaCls.php';
// nếu có biến yêu cầu và đúng tên biến thì cho vô còn không đẩy về index.php ngăn truy cập không mục đích rõ ràng
if (isset($_GET['reqact'])) {
    $requestAction = $_GET['reqact'];
    echo $requestAction;
    switch ($requestAction) {
        case 'addnew': // thêm mới
            //xử lý thêm mới
            //nhận dữ liệu
            $tenhanghoa = $_REQUEST['tenhanghoa'];
            $giathamkhao = $_REQUEST['giathamkhao'];
            $mota = $_REQUEST['mota'];
            $idloaihang = $_REQUEST['idloaihang'];
            $hinhanh_file = $_FILES['fileimage']['tmp_name']; // hổng lẽ phải gõ đúng chữ fileimage??
            //encode MT 2 chiều về thành MT 1 chiều
            $hinhanh = base64_encode(file_get_contents(addslashes($hinhanh_file)));
            //kiểm thử dữ liệu đã nhận đủ không?
            //   echo $tenhanghoa . '<br/>';
            //   echo $mota . '<br/>';
            //   echo $giathamkhao . '<br/>';
            //   echo $idloaihang . '<br/>';
            //   echo $hinhanh . '<br/>';
              

            //ok
            // khởi tạo đối tượng và thực hiện thêm dữ liệu
            $lh = new hanghoa();
        
            $kq = $lh->hanghoaAdd($tenhanghoa,$mota,$giathamkhao,$hinhanh,$idloaihang);
            //echo $kq . '<br>';
            if ($kq) {
                header('location: ../../index.php?req=hanghoaview&result=ok');
            } else {
                header('location: ../../index.php?req=hanghoaview&result=notok');
            }
            break;
        case 'deletehanghoa':
            //nhận dữ liệu gửi về và kiểm thử
            $idhanghoa = $_REQUEST['idhanghoa'];
            //echo $idhanghoa;
            //khởi tạo đối tượng và thực hiện chức năng xoá
            $lh = new hanghoa();
            $kq = $lh->hanghoaDelete($idhanghoa);
            // trả kết quả
            if ($kq) {
                header('location: ../../index.php?req=hanghoaview&result=ok');
            } else {
                header('location: ../../index.php?req=hanghoaview&result=notok');
            }
            break;

        case 'updatehanghoa': // update loai hang
            //nhận dữ liệu và kiểm thử
            $idhanghoa = $_REQUEST['idhanghoa'];
            $tenhanghoa = $_REQUEST['tenhanghoa'];
            $giathamkhao = $_REQUEST['giathamkhao'];
            $idloaihang = $_REQUEST['idloaihang'];
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
            // echo $idhanghoa . '<br/>';
            // echo $tenhanghoa . '<br/>';
            // echo $mota . '<br/>';
            // echo $hinhanh . '<br/>';
            //ok dữ liệu
            // tạo đối tượng và thực hiện update sau đó xử lý kết quả trả về
            $lh = new hanghoa();
            $kq = $lh->hanghoaUpdate($tenhanghoa,$hinhanh,$mota,$giathamkhao,$idloaihang,$idhanghoa);
             if($kq){
                header('location: ../../index.php?req=hanghoaview&result=ok');
            }else{
                header('location: ../../index.php?req=hanghoaview&result=notok');
            }
            break;
        default:
            // dành cho trường hợp không gán thí đại giá trị nào đó không trong cấu trúc xử lý --> truy cập không hợp lệ
            header('location: ../../index.php?req=hanghoaview');
            break;
    }
} else {
    //nhảy lại địa chỉ index.php    
    header('location: ../../index.php?req=hanghoaview');
}
