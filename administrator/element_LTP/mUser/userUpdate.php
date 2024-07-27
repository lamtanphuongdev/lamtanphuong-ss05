<div>Cập nhật người dùng</div>
<?php
    require './element_LTP/mod/userCls.php'; //gọi thư viên user
    //nhận dữ liệu iduser cần cập nhật
    $iduser = $_REQUEST['iduser'];
    //echo $iduser;
    //load dữ liệu đối tượng để cập nhật
    $userObj = new user();
    $getUserUpdate = $userObj->UserGetById($iduser);
    //kiểm thử dữ liệu load lên;
    //echo $getUserUpdate->hoten;
    // tạo form hiển thị dữ liệu để sửa
?>
<!-- 1.kiểm thử form action tới trang xử lý userAct.php -> ok tới nơi  
        2. gán dữ liệu đối tượng load lên vào form để sửa qua thuộc tính value
        3. dữ liệu giới tính hơi đặc biệt nên xử lý khác 
        4. chúng ta còn iduser chưa được gửi về trang userAct.php (có nó mới cập nhật đươc)
        có 2 cách gửi 1 là gửi theo liên kết trong Action form  
        2 là gửi bằng thẻ hiden, tại đây chọn 2 cho biết-->
<div>
<form name="updateuser" id="formupdate" method="post" action='./element_LTP/mUser/userAct.php?reqact=updateuser'>
        <!-- tạo một thẻ input kiểu hidden gán trị cho nó là iduser -->
        <!-- thẻ hidden này không hiển thị trên form như khi post dữ liệu nó sẽ post value đi luôn -->
        <input type="hidden" name="iduser" value="<?php echo $getUserUpdate->iduser; ?>"/>
        <table>
            <tr>
                <td>Tên đăng nhập</td>
                <td><input type="text" name="username" value="<?php echo $getUserUpdate->username; ?>" /></td>
            </tr>
            <tr>
                <td>Mật khẩu</td>
                <td><input type="password" name="password" value="<?php echo $getUserUpdate->password; ?>" /></td>
            </tr>
            <tr>
                <td>Họ tên</td>
                <td><input type="text" name="hoten" value="<?php echo $getUserUpdate->hoten; ?>" /></td>
            </tr>
            <tr>
                <td>Giới tính</td>
                <td>
                    Nam<input type="radio" name="gioitinh" value="1" <?php if($getUserUpdate->gioitinh == 1) echo 'checked'; ?>/>
                    Nữ<input type="radio" name="gioitinh" value="0" <?php if($getUserUpdate->gioitinh == 0) echo 'checked'; ?> />
                </td>
            </tr>
            <tr>
                <td>Ngày sinh</td>
                <td><input type="date" name="ngaysinh" value="<?php echo $getUserUpdate->ngaysinh; ?>" /></td>
            </tr>
            <tr>
                <td>Địa chỉ</td>
                <td><input type="text" name="diachi" value="<?php echo $getUserUpdate->diachi; ?>" /></td>
            </tr>
            <tr>
                <td>Điện thoại</td>
                <td><input type="tel" name="dienthoai" value="<?php echo $getUserUpdate->dienthoai; ?>" /></td>
            </tr>
            <tr>
                <td> <input type="submit" id="btnsubmit" value="Update" /></td>
                <td><b id="noteForm"></b></td>
                <!-- xoá reset đi vì click vô mất tiêu hết dữ liệu lấy đâu mà biết cập nhật -->
            </tr>
        </table>
    </form>
</div>