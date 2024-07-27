$(document).ready(function () {
    // alert("jq run");

    $(".ItemOrder").hide();
    $(".cateOrder").click(function (e) {
        e.preventDefault();
        $(this).next().slideDown();
        //  $(".ItemOrder").slideDown();
    });

    $(".ItemOrder").mouseleave(function () {
        $(this).slideUp();
    });

    // tắt tạm thời để làm mấy công chuyện kia cho nó dễ
    // $("#formreg").submit(function (e) { 
    //     e.preventDefault();
    //     var username = $("input[name*='username']").val();
    //     if(username.length === 0 || username.length < 6){
    //         $("input[name*='username']").focus();
    //         $('#noteForm').html('Tên đăng nhập chưa hợp lệ');
    //         return false;
    //     }

    //     return true;


    // });

    // Update aj:
    $("#aj_layer").hide();
    $(".aj_btnupdate").click(function (e) {
        e.preventDefault();

        var $width_aj_layer = $("#aj_layer").css("width");

        var $iduser = $(this).attr('value');

        $("#aj_layer").css("left", e.pageX - $width_aj_layer);
        $("#aj_layer").css("top", e.pageY + 20);
        $("#aj_layer").show(10);
        $("#aj_layer_update").load("./element_LTP/mUser/userAjUd.php", { iduser: $iduser }, function (response, status, request) {
            this; // dom element

        });

    });
    $("#aj_layer_close").click(function (e) {
        e.preventDefault();
        $("#aj_layer").hide(10);
    });

    // update loại hàng dùng ajax + new layer
    // phải đóng trước thì mới có cái để mở lên
    $("#w_update").hide();
    // click vào class nút update để mở lên
    $(".w_update_btn_open").click(function (e) {
        e.preventDefault();

        //lấy toạ độ dựa vào super parameter e
        //alert(e.pageX + '--'+ e.pageY);
        //gán cho của sổ div thông qua css của nó --> ok nhưng nó gần mouse quá --> cộng thêm tí
        $("#w_update").css("left", e.pageX + 5);
        $("#w_update").css("top", e.pageY +5);

        //lấy dữ liệu trong thuộc tính value
        var $idloaihang = $(this).attr('value');
      
        //sử dụng hàm load() của ajax để gọi trang update vào trong của sổ div
        //load post dữ liệu gửi dạng post. load get thì gửi kiểu get
        $("#w_update_form").load("./element_LTP/mLoaihang/loaihangUpdate.php", {idloaihang:$idloaihang}, function (response, status, request) {
            this; // dom element
            
        });

        $("#w_update").show();
    });
    //xử lý đóng
    $("#w_close_btn").click(function (e) {
        e.preventDefault();
        $("#w_update").hide();

    });

    // update loại hàng dùng ajax + new layer
    // phải đóng trước thì mới có cái để mở lên
    $("#w_update_hh").hide();
    // click vào class nút update để mở lên
    $(".w_update_btn_open_hh").click(function (e) {
        e.preventDefault();

        //lấy toạ độ dựa vào super parameter e
        //alert(e.pageX + '--'+ e.pageY);
        //gán cho của sổ div thông qua css của nó --> ok nhưng nó gần mouse quá --> cộng thêm tí
        $("#w_update_hh").css("left", e.pageX + 5);
        $("#w_update_hh").css("top", e.pageY +5);

        //lấy dữ liệu trong thuộc tính value
        var $idhanghoa = $(this).attr('value');
        
        //sử dụng hàm load() của ajax để gọi trang update vào trong của sổ div
        //load post dữ liệu gửi dạng post. load get thì gửi kiểu get
        $("#w_update_form_hh").load("./element_LTP/mHanghoa/hanghoaUpdate.php", {idhanghoa:$idhanghoa}, function (response, status, request) {
            this; // dom element
            
        });

        $("#w_update_hh").show();
    });
    //xử lý đóng
    $("#w_close_btn_hh").click(function (e) {
        e.preventDefault();
        $("#w_update_hh").hide();

    });
});