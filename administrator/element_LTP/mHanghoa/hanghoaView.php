<div>Quản Lý Hàng hoá</div>
<hr>
<div>Thêm hàng hoá</div>
<?php 
require './element_LTP/mod/loaihangCls.php'; // gọi thư viên để sử dụng được lớp userCls
$lhObj = new loaihang();
$list_lh = $lhObj->LoaihangGetAll(); // trả về danh sách đối tượng user
$l = count($list_lh);
?>
<div>
    <form name="newhanghoa" id="formaddhanghoa" method="post" enctype="multipart/form-data" action='./element_LTP/mHanghoa/hanghoaAct.php?reqact=addnew'>
        <table>
            <tr>
                <td>Tên hàng hoá</td>
                <td><input type="text" name="tenhanghoa" /></td>
            </tr>
            <tr>
                <td>Giá tham khảo</td>
                <td><input type="number" name="giathamkhao" /></td>
            </tr>
            <tr>
                <td>Mô tả</td>
                <td><input type="text" name="mota" /></td>
            </tr>
            <tr>
                <td>Hình ảnh</td>
                <td><input type="file" name="fileimage"></td>
            </tr>
            <tr>
                <td>Chọn loại hàng:</td>
                <!-- tại đây chúng ta sẽ dùng radio để chọn -->
                <td>
                    <?php 
                        foreach ($list_lh as $l) {
                            ?>
                            <input type="radio" name="idloaihang" value="<?php echo $l->idloaihang; ?>">
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
                <td> <input type="submit" id="btnsubmit" value="Tạo mới" /></td>
                <td> <input type="reset" value="Làm lại" /> <b id="noteForm"></b></td>
            </tr>
        </table>
    </form>
    <hr />
    <?php
    require './element_LTP/mod/hanghoaCls.php'; // gọi thư viên để sử dụng được lớp userCls
    $lhObj = new hanghoa();
    $list_lh = $lhObj->hanghoaGetAll(); // trả về danh sách đối tượng user
    $l = count($list_lh);
    ?>
    <div class="title_hanghoa">Danh sách hàng hoá</div>
    <div class="content_hanghoa">
        Trong bảng có: <b><?php echo $l; ?></b>

        <table border="solid">
            <thead> <!-- dòng tiêu đề -->
                <th>ID</th>
                <th>Tên loại hàng</th>
                <th>Giá tham khảo</th>
                <th>Mô tả</th>
                <th>Hình ảnh</th>
                <th>Chức năng</th>
            </thead>
            <?php
            //trong danh sách trả về có dữ liệu
            if ($l > 0) {
                foreach ($list_lh as $u) {
            ?>
                    <tr>
                        <td><?php echo $u->idhanghoa; ?></td>
                        <td><?php echo $u->tenhanghoa; ?></td>
                        <td><?php echo $u->giathamkhao; ?></td>
                        <td><?php echo $u->mota; ?></td>
                        <td align="center">
                            <img class="iconbutton" src="data:image/png;base64,<?php echo $u->hinhanh; ?>">
                            <!-- decode hinh anh -->
                        </td>
                        <td align="center">
                            <?php
                            if (isset($_SESSION['ADMIN'])) {
                            ?>
                                <a href="./element_LTP/mhanghoa/hanghoaAct.php?reqact=deletehanghoa&idhanghoa=<?php echo $u->idhanghoa; ?>">
                                    <!-- click vô hình để xoá -->
                                    <img src="./img_LTP/idelete.png" class="iconimg">
                                </a>
                            <?php
                            } else {
                            ?>
                                <img src="./img_LTP/idelete.png" class="iconimg">
                            <?php
                            }
                            ?>
                            <img height="25px" src="./img_LTP/updateicon.png" class="w_update_btn_open_hh" value="<?php echo $u->idhanghoa;?>">
                        </td>
                    </tr>
            <?php
                }
            }
            ?>
        </table>
    </div>

    <div id="w_update_hh">
        <div id="w_update_form_hh"></div>
        <input type="button" value="close" id="w_close_btn_hh">
    </div>
</div>