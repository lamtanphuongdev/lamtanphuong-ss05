<script>
    function goBack(){
        window.history.back();
    }
</script>
<?php
require './administrator/element_LTP/mod/hanghoaCls.php';
$hanghoa = new hanghoa();

if (isset($_GET['reqHanghoa'])) {
    $idhanghoa = $_GET['reqHanghoa'];
    $obj = $hanghoa->hanghoaGetbyId($idhanghoa);
}
?>

<div class="itemsViewHangHoa">
    <center>
        <img class="imgViewHanghoa" src="data:image/png;base64,<?php echo $obj->hinhanh; ?>"><br>
        Sản phẩm: <?php echo $obj->tenhanghoa; ?><br>
        Mô tả: <?php echo $obj->mota; ?><br>
        Giá bán: <?php echo $obj->giathamkhao; ?><br>
        <button onclick="goBack()"> Go Back</button>
    </center>
</div>