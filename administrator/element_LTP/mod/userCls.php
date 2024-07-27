<?php
$s = '../../element_LTP/mod/database.php';
if (file_exists($s)) {
    $f = $s;
} else {
    $f = './element_LTP/mod/database.php';
}
require_once $f;
//xử lý tại đây phục vụ cho việc gọi trang từ những vị trí khác nhau. 
// có khi được gọi từ trang index.php để lấy dữ liệu
// hoặc có khi gọi từ trang xử lý IUD...

class user extends Database
{
    public function UserCheckLogin($username, $password)
    {
        $sql = 'select * from user where username = ? and password = ? and setlock = 1';
        $data = array($username, $password);

        $select = $this->connect->prepare($sql);
        $select->setFetchMode(PDO::FETCH_OBJ);
        $select->execute($data);

        $get_obj = count($select->fetchAll());

        if ($get_obj === 1) {
            return true;
        } else {
            return false;
        }
    }
    public function UserCheckUsername($username)
    {
        $sql = 'select * from user where username = ?';
        $data = array($username);

        $select = $this->connect->prepare($sql);
        $select->setFetchMode(PDO::FETCH_OBJ);
        $select->execute($data);

        $get_obj = count($select->fetchAll());

        if ($get_obj === 1) {
            return true;
        } else {
            return false;
        }
    }
    public function UserGetAll()
    {
        $sql = 'select * from user';

        $getAll = $this->connect->prepare($sql);
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();

        return $getAll->fetchAll();
    }
    public function UserAdd($username, $password, $hoten, $gioitinh, $ngaysinh, $diachi, $dienthoai)
    {
        $sql = "INSERT INTO user (username, password, hoten, gioitinh, ngaysinh, diachi, dienthoai) VALUES (?,?,?,?,?,?,?)";
        $data = array($username, $password, $hoten, $gioitinh, $ngaysinh, $diachi, $dienthoai);

        $add = $this->connect->prepare($sql);
        $add->execute($data);
        return $add->rowCount();
    }
    public function UserDelete($iduser)
    {
        $sql = "DELETE from user where iduser = ?";
        $data = array($iduser);

        $del = $this->connect->prepare($sql);
        $del->execute($data);
        return $del->rowCount();
    }
    public function UserUpdate($username, $password, $hoten, $gioitinh, $ngaysinh, $diachi, $dienthoai, $iduser)
    {
        $sql = "UPDATE user set username = ?, password = ?, hoten =?, gioitinh=?, ngaysinh=?, diachi=?, dienthoai=? WHERE iduser =? ";
        $data = array($username, $password, $hoten, $gioitinh, $ngaysinh, $diachi, $dienthoai, $iduser);

        $update = $this->connect->prepare($sql);
        $update->execute($data);
        return $update->rowCount();
    }
    public function UserGetById($iduser)
    {
        $sql = 'select * from user where iduser=?';
        $data = array($iduser);

        $getOne = $this->connect->prepare($sql);
        $getOne->setFetchMode(PDO::FETCH_OBJ);
        $getOne->execute($data);

        return $getOne->fetch();
    }
    public function UserSetPassword($iduser, $password)
    {
        $sql = "UPDATE user set password = ? WHERE iduser =? ";
        $data = array($password, $iduser);

        $update_pass = $this->connect->prepare($sql);
        $update_pass->execute($data);
        return $update_pass->rowCount();
    }
    public function UserSetActive($iduser, $setlock)
    {
        $sql = "UPDATE user set setlock = ? WHERE iduser =? ";
        $data = array($setlock, $iduser);

        $update_lock = $this->connect->prepare($sql);
        $update_lock->execute($data);
        return $update_lock->rowCount();
    }
    public function UserChangePassword($iduser, $passwordold, $passwordnew)
    {
        $sql = 'select * from user where iduser = ? and password = ?';
        $data = array($iduser, $passwordold);

        $select = $this->connect->prepare($sql);
        $select->setFetchMode(PDO::FETCH_OBJ);
        $select->execute($data);

        $get_obj = count($select->fetchAll());

        if ($get_obj === 1) {
            $sql = "UPDATE user set password = ? WHERE iduser =? ";
            $data = array($passwordnew, $iduser);

            $update_pass = $this->connect->prepare($sql);
            $update_pass->execute($data);
            return $update_pass->rowCount();
        } else {
            return false;
        }
    }
}
// kiểm thử một số chức năng
// Insert từ userAdd ==> ok chạy ngon lành

    // $user = new user();
    // $row = $user->UserAdd('ltp','ltphuong1234','Lý Thành Phong','1','1976-09-09','Lê Lợi, Ninh Kiều, Cần Thơ','0939112234');
    // echo $row;
// kiem tra userchecklogin(); --> ok| hàm này dùng để kiểm tra tài khoản khi đăng nhập
    // $user = new user();
    // echo $user->UserCheckLogin('admin','admin1234');
// kiểm tra checkUsername(); --> ok| hàm này dùng để kiểm tra trùng tên tài khoản khi đăng ký
    // $user = new user();
    // echo $user->UserCheckUsername('admini');
// kiểm thử hàm usergetall; ---> ok | dùng để lấy toàn bộ danh sách người dùng để hiển thị;
    // $user = new user();
    // $list = $user->UserGetAll(); // trả về là 1 danh sách đối tượng
    // foreach ($list as $l) {
    //     echo $l->hoten . '<br/>';
    // }

// kiểm thử xoá --> ok
        // $user = new user();
        // echo $user->UserDelete(5);
// kiểm tra update --> ok luôn

    // $user = new user();
    // $row = $user->UserUpdate('ltpP','ltphu1234','Lý Thành','0','1975-10-10','Lê Lai, Bình Thuỷ, Sóc Trăng','0978909787',6);
    // echo $row;

// kiểm thử getId --> ok 

    // $user = new user();
    // $obj = $user->UserGetById(6); // trả về là 1 đối tượng
    // echo $obj->username . '<br/>';
    // echo $obj->hoten . '<br/>';
    // echo $obj->gioitinh . '<br/>';
    // echo $obj->ngaysinh . '<br/>';
    // echo $obj->diachi . '<br/>';
// // kiểm thử setpassword
//         $u = new user();
//         echo $u->UserSetPassword(7,'123456');

// // kiểm thử setlock
        // $u = new user();
        // echo $u->UserSetActive(6,0);
// // kiểm thử changepassword
        // $u = new user();
        // echo $u->UserChangePassword(6,1,'lamtan');

    /// ok
