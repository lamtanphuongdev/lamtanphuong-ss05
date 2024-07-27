<?php
session_start();
require '../../element_LTP/mod/userCls.php';
   // nếu có biến yêu cầu và đúng tên biến thì cho vô còn không đẩy về index.php ngăn truy cập không mục đích rõ ràng
   if(isset($_GET['reqact'])){
        $requestAction = $_GET['reqact'];
        switch ($requestAction){
            case 'addnew': // thêm mới
                //xử lý thêm mới
                //nhận dữ liệu
                $username = $_REQUEST['username'];
                $password = $_REQUEST['password'];
                $hoten = $_REQUEST['hoten'];
                $gioitinh = $_REQUEST['gioitinh'];
                $ngaysinh = $_REQUEST['ngaysinh'];
                $diachi = $_REQUEST['diachi'];
                $dienthoai = $_REQUEST['dienthoai'];
                //kiểm thử dữ liệu đã nhận đủ không?
                // echo $username . '<br/>';
                // echo $password . '<br/>';
                // echo $hoten . '<br/>';
                // echo $gioitinh . '<br/>';
                // echo $ngaysinh . '<br/>';
                // echo $diachi . '<br/>';
                // echo $dienthoai . '<br/>';
                //ok
               // khởi tạo đối tượng và thực hiện thêm dữ liệu
                $userObj = new user();
                $kq = $userObj->UserAdd($username,$password,$hoten,$gioitinh,$ngaysinh,$diachi,$dienthoai);
                
                if($kq){
                    header('location: ../../index.php?req=userview&result=ok');
                }else{
                    header('location: ../../index.php?req=userview&result=notok');
                }
                break;
            case 'deleteuser':
                //nhận dữ liệu gửi về và kiểm thử
                $iduser = $_REQUEST['iduser'];
                //echo $iduser;
                //khởi tạo đối tượng và thực hiện chức năng xoá
                $userObj = new user();
                $kq = $userObj->UserDelete($iduser);
                if($kq){
                    header('location: ../../index.php?req=userview&result=ok');
                }else{
                    header('location: ../../index.php?req=userview&result=notok');
                }
                // xử lý kết quả trả về
                break;
            case 'setlock':
                //nhận dữ liệu gửi về và kiểm thử
                $iduser = $_REQUEST['iduser'];
                $setlock = $_REQUEST['setlock'];
                // echo $iduser . '<br/>';
                // echo $setlock . '<br/>';
                //khởi tạo đối tượng và thực hiện chức năng setlock
                $userObj = new user();
                //nếu setlock = 1 là mở khoá thì gán lại setlock = 0 và ngược laị
                if($setlock == 1){
                    $kq = $userObj->UserSetActive($iduser,0);
                }else{
                    $kq = $userObj->UserSetActive($iduser,1);
                }
                if($kq){
                    header('location: ../../index.php?req=userview&result=ok');
                }else{
                    header('location: ../../index.php?req=userview&result=notok');
                }
                break;
            case 'updateuser': // update user
                //nhận dữ liệu và kiểm thử
                $iduser = $_REQUEST['iduser'];
                $username = $_REQUEST['username'];
                $password = $_REQUEST['password'];
                $hoten = $_REQUEST['hoten'];
                $gioitinh = $_REQUEST['gioitinh'];
                $ngaysinh = $_REQUEST['ngaysinh'];
                $diachi = $_REQUEST['diachi'];
                $dienthoai = $_REQUEST['dienthoai'];
                //kiểm thử dữ liệu đã nhận đủ không?
                // echo $iduser . '<br/>';
                // echo $username . '<br/>';
                // echo $password . '<br/>';
                // echo $hoten . '<br/>';
                // echo $gioitinh . '<br/>';
                // echo $ngaysinh . '<br/>';
                // echo $diachi . '<br/>';
                // echo $dienthoai . '<br/>';
                //ok dữ liệu
                // tạo đối tượng và thực hiện update sau đó xử lý kết quả trả về
                $userObj = new user();
                $kq = $userObj->UserUpdate($username, $password,$hoten,$gioitinh,$ngaysinh,$diachi,$dienthoai,$iduser);
                if($kq){
                    header('location: ../../index.php?req=userview&result=ok');
                }else{
                    header('location: ../../index.php?req=userview&result=notok');
                }
                break;
            case 'checklogin':
                //nhận dữ liệu
                $username = $_REQUEST['username'];
                $password = $_REQUEST['password'];
               //tạo đối tượng --> kiểm tra đăng nhập
                $userObj = new user();
                $kq = $userObj->UserCheckLogin($username,$password);
                if($kq){
                    if($username == 'admin'){
                        $_SESSION['ADMIN'] = $username;
                    }else{
                        $_SESSION['USER'] = $username;
                    }
                    header('location: ../../index.php?req=userview&result=ok');
                }else{
                    header('location: ../../index.php?req=userview&result=notok');
                }
                break;
            case 'userlogout':
                //Lấy thời gian đăng xuất
                $time_login = date('h:i - d/m/Y');
                //lấy tên user
                if(isset($_SESSION['USER'])){
                    $namelogin = $_SESSION['USER'];
                }
            
                if(isset($_SESSION['ADMIN'])){
                    $namelogin = $_SESSION['ADMIN'];
                }

                //set cookies -> lưu cookies vào máy client
                setcookie($namelogin,$time_login,time()+(86400*30),'/'); // cookies có thời hạn là 1 tháng đơn vị thời gian tính bằng giây
                
                //xử lý yêu cầu logout
                session_destroy(); // xoá hết tất cả các SESSION
                // quay về trang index.php
                header('location: ../../index.php');
                break;
            default:
            // dành cho trường hợp không gán thí đại giá trị nào đó không trong cấu trúc xử lý --> truy cập không hợp lệ
            header('location: ../../index.php?req=userview');
            break;
        }
   }else{
    //nhảy lại địa chỉ index.php    
    header('location: ../../index.php?req=userview');
   }