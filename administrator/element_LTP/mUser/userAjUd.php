<!-- <script type="text/javascript" src="js_LTP/jquery-3.7.1.js"></script>
<script type="text/javascript" src="js_LTP/jscript.js"></script> -->
<div align="center">Cập nhật người dùng</div>
<?php
  require '../../element_LTP/mod/userCls.php'; 

  $iduser = $_REQUEST['iduser'];
   // echo $iduser;
  $userObj = new user();
  $getUserUpdate = $userObj->UserGetById($iduser);

?>

<div>
    <form name="updateuser" id="formupdate" method="post" action='./element_LTP/mUser/userAct.php?reqact=updateuser'>
        <input type="hidden" name="iduser" value="<?php echo $getUserUpdate->iduser; 
                                                    ?>" />
        <table border="solid">
            <tr>
                <td>Tên đăng nhập</td>
                <td>Mật khẩu</td>
                <td>Họ tên</td>
                <td>Giới tính</td>
                <td>Ngày sinh</td>
                <td>Địa chỉ</td>
                <td>Điện thoại</td>
            </tr>
            <tr>
                <td><input type="text" name="username" value="<?php echo $getUserUpdate->username; 
                                                                ?>" /></td>
                <td><input type="password" name="password" value="<?php echo $getUserUpdate->password; 
                                                                    ?>" /></td>
                <td><input type="text" name="hoten" value="<?php echo $getUserUpdate->hoten; 
                                                            ?>" /></td>
                <td>
                    Nam<input type="radio" name="gioitinh" value="1" <?php if ($getUserUpdate->gioitinh == 1) echo 'checked'; 
                                                                        ?> />
                    Nữ<input type="radio" name="gioitinh" value="0" <?php if ($getUserUpdate->gioitinh == 0) echo 'checked'; 
                                                                    ?> />
                </td>
                <td><input type="date" name="ngaysinh" value="<?php echo $getUserUpdate->ngaysinh; 
                                                                ?>" /></td>
                <td><input type="text" name="diachi" value="<?php echo $getUserUpdate->diachi; 
                                                            ?>" /></td>
                <td><input type="tel" name="dienthoai" value="<?php echo $getUserUpdate->dienthoai; 
                                                                ?>" /></td>
            </tr>

            <tr>
                <td colspan="7" align="right">
                    <b id="noteForm"></b>
                    <input type="submit" id="btnsubmit" value="Update" />
                </td>
            </tr>
        </table>
    </form>

</div>