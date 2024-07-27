<div align="center">Cập nhật loại hàng</div>
<hr>
<?php
    require '../../element_LTP/mod/loaihangCls.php'; //gọi thư viên loại hàng
    //nhận dữ liệu idloaihang cần cập nhật
    $idloaihang = $_REQUEST['idloaihang'];
    //echo $idloaihang;
    //load dữ liệu đối tượng để cập nhật
     $lhObj = new loaihang();
     $getLhUpdate = $lhObj->LoaihangGetbyId($idloaihang);
    //kiểm thử dữ liệu load lên;
    //echo $getUserUpdate->hoten;
    // tạo form hiển thị dữ liệu để sửa
?>
<div>
<form name="updateloaihang" id="formupdatelh" enctype="multipart/form-data" method="post" action='./element_LTP/mLoaihang/loaihangAct.php?reqact=updateloaihang'>
        <!-- tạo một thẻ input kiểu hidden gán trị cho nó là iduser -->
        <!-- thẻ hidden này không hiển thị trên form như khi post dữ liệu nó sẽ post value đi luôn -->
        <input type="hidden" name="idloaihang" value="<?php echo $getLhUpdate->idloaihang; ?>"/>
        <input type="hidden" name="hinhanh" value="<?php echo $getLhUpdate->hinhanh; ?>"/>
        <table>
            <tr>
                <td>Tên loại hàng</td>
                <td><input type="text" name="tenloaihang" value="<?php echo $getLhUpdate->tenloaihang; ?>" /></td>
            </tr>
            <tr>
                <td>Mô tả</td>
                <td><input type="text" size="50" name="mota" value="<?php echo $getLhUpdate->mota; ?>" /></td>
            </tr>
            <tr>
                <td>Hình ảnh</td>
                <td>
                <img width="150px" src="data:image/png;base64,<?php echo $getLhUpdate->hinhanh ?>" ><br>    
                <input type="file" name="fileimage">
                </td>
            </tr>
            
            <tr>
                <td> <input type="submit" id="btnsubmit" value="Update"/></td>
                <td><b id="noteForm"></b></td>
            </tr>
        </table>
    </form>
</div>