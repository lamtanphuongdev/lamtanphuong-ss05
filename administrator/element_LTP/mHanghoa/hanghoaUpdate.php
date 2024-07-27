<div align="center">Cập nhật hàng hoá</div>
<hr>
<?php
require '../../element_LTP/mod/hanghoaCls.php'; //gọi thư viên hàng hoa
require '../../element_LTP/mod/loaihangCls.php'; //gọi thư viên hàng hoa
//nhận dữ liệu idhanghoa cần cập nhật
$idhoahang = $_REQUEST['idhanghoa'];
//echo $idhanghoa;
//load dữ liệu đối tượng để cập nhật
$lhObj = new hanghoa();
$getLhUpdate = $lhObj->hanghoaGetbyId($idhoahang);
//kiểm thử dữ liệu load lên;
//echo $getUserUpdate->hoten;
// tạo form hiển thị dữ liệu để sửa
//load loai hang
$Obj = new loaihang();
$list_lh = $Obj->LoaihangGetAll(); // trả về danh sách đối tượng user
?>
<div>
    <form name="updatehanghoa" id="formupdatehh" enctype="multipart/form-data" method="post" action='./element_LTP/mHanghoa/hanghoaAct.php?reqact=updatehanghoa'>
        <!-- tạo một thẻ input kiểu hidden gán trị cho nó là iduser -->
        <!-- thẻ hidden này không hiển thị trên form như khi post dữ liệu nó sẽ post value đi luôn -->
        <input type="hidden" name="idhanghoa" value="<?php echo $getLhUpdate->idhanghoa; ?>" />
        <input type="hidden" name="hinhanh" value="<?php echo $getLhUpdate->hinhanh; ?>" />
        <table>
            <tr>
                <td>Tên loại hàng</td>
                <td><input type="text" name="tenhanghoa" value="<?php echo $getLhUpdate->tenhanghoa; ?>" /></td>
            </tr>
            <tr>
                <td>Giá tham khảo</td>
                <td><input type="text" name="giathamkhao" value="<?php echo $getLhUpdate->giathamkhao; ?>" /></td>
            </tr>
            <tr>
                <td>Mô tả</td>
                <td><input type="text" size="50" name="mota" value="<?php echo $getLhUpdate->mota; ?>" /></td>
            </tr>
            <tr>
                <td>Chọn loại hàng:</td>
                <!-- tại đây chúng ta sẽ dùng radio để chọn -->
                <td>
                    <?php 
                        foreach ($list_lh as $l) {
                            ?>
                            <input type="radio" name="idloaihang" value="<?php echo $l->idloaihang; ?>" <?php if($l->idloaihang == $getLhUpdate->idloaihang){echo 'checked';} ?>>
                            <!-- thay vì để tên loại hàng thì chúng ta lấy hình ảnh nhìn cho nó đẹp -->
                            <!-- hình chỉ hiển thị để xem thông tin thôi không tham gia gửi dữ liệu đi chỉ có gửi idloaihang mà thôi -->
                            <img class="iconbutton" src="data:image/png;base64,<?php echo $l->hinhanh; ?>">
                            <br>
                            <?php
                        }
                    ?>
                </td>
            </tr>
            <tr>
                <td>Hình ảnh</td>
                <td>
                    <img width="150px" src="data:image/png;base64,<?php echo $getLhUpdate->hinhanh ?>"><br>
                    <input type="file" name="fileimage">
                </td>
            </tr>

            <tr>
                <td> <input type="submit" id="btnsubmit" value="Update" /></td>
                <td><b id="noteForm"></b></td>
            </tr>
        </table>
    </form>
</div>