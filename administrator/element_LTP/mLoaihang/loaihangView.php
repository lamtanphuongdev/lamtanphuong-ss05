<div>Quản Lý Loại hàng</div>
<hr>
<div>Thêm loại hàng</div>
<div>
    <form name="newloaihang" id="formaddloaihang" method="post" enctype="multipart/form-data" action='./element_LTP/mLoaihang/loaihangAct.php?reqact=addnew'>
        <table>
            <tr>
                <td>Tên đăng nhập</td>
                <td><input type="text" name="tenloaihang" /></td>
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
                <td> <input type="submit" id="btnsubmit" value="Tạo mới" /></td>
                <td> <input type="reset" value="Làm lại" /> <b id="noteForm"></b></td>
            </tr>
        </table>
    </form>
    <hr />
    <?php
    require './element_LTP/mod/loaihangCls.php'; // gọi thư viên để sử dụng được lớp userCls
    $lhObj = new loaihang();
    $list_lh = $lhObj->LoaihangGetAll(); // trả về danh sách đối tượng user
    $l = count($list_lh);
    ?>
    <div class="title_loaihang">Danh sách loại hàng</div>
    <div class="content_loaihang">
        Trong bảng có: <b><?php echo $l; ?></b>

        <table border="solid">
            <thead> <!-- dòng tiêu đề -->
                <th>ID</th>
                <th>Tên loại hàng</th>
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
                        <td><?php echo $u->idloaihang; ?></td>
                        <td><?php echo $u->tenloaihang; ?></td>
                        <td><?php echo $u->mota; ?></td>
                        <td align="center">
                            <img class="iconbutton" src="data:image/png;base64,<?php echo $u->hinhanh; ?>">
                            <!-- decode hinh anh -->
                        </td>
                        <td align="center">
                            <?php
                            if (isset($_SESSION['ADMIN'])) {
                            ?>
                                <a href="./element_LTP/mLoaihang/loaihangAct.php?reqact=deleteloaihang&idloaihang=<?php echo $u->idloaihang; ?>">
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
                            <img height="25px" src="./img_LTP/updateicon.png" class="w_update_btn_open" value="<?php echo $u->idloaihang;?>">
                        </td>
                    </tr>
            <?php
                }
            }
            ?>
        </table>
    </div>

    <div id="w_update">
        <div id="w_update_form"></div>
        <input type="button" value="close" id="w_close_btn">
    </div>
</div>