<?php
$s = '../../element_LTP/mod/database.php';
if (file_exists($s)) {
    $f = $s;
} else {
    $f = './element_LTP/mod/database.php';
    if(!file_exists($f)){
        $f = './administrator/element_LTP/mod/database.php';
    }
}
require_once $f;

class hanghoa extends Database{
    public function hanghoaGetAll(){
        $sql = 'select * from hanghoa';

        $getAll = $this->connect->prepare($sql);
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();

        return $getAll->fetchAll();
    }//ok
    public function hanghoaAdd($tenhanghoa,$mota,$giathamkhao,$hinhanh,$idloaihang){
        $sql = "INSERT INTO hanghoa(tenhanghoa, mota, giathamkhao,hinhanh,idloaihang) VALUES(?,?,?,?,?)";
        $data = array($tenhanghoa, $mota, $giathamkhao, $hinhanh, $idloaihang);
        $add = $this->connect->prepare($sql);
        $add->execute($data);
        return $add->rowCount();
    }
    public function hanghoaDelete($idhanghoa){
        $sql = "DELETE from hanghoa where idhanghoa = ?";
        $data = array($idhanghoa);

        $del = $this->connect->prepare($sql);
        $del->execute($data);
        return $del->rowCount();
    } //ok
    public function hanghoaUpdate($tenhanghoa,$hinhanh,$mota,$giathamkhao,$idloaihang,$idhanghoa){
        $sql = "UPDATE hanghoa set tenhanghoa = ?, hinhanh = ?, mota =?, giathamkhao =?, idloaihang =? WHERE idhanghoa =? ";
        $data = array($tenhanghoa,$hinhanh,$mota,$giathamkhao, $idloaihang,$idhanghoa);

        $update = $this->connect->prepare($sql);
        $update->execute($data);
        return $update->rowCount();
    }
    public function hanghoaGetbyId($idhanghoa){
        $sql = 'select * from hanghoa where idhanghoa=?';
        $data = array($idhanghoa);

        $getOne = $this->connect->prepare($sql);
        $getOne->setFetchMode(PDO::FETCH_OBJ);
        $getOne->execute($data);

        return $getOne->fetch();
    }

    public function hanghoaGetbyIdloaihang($idloaihang){
        $sql = 'select * from hanghoa where idloaihang=?';
        $data = array($idloaihang);

        $getOne = $this->connect->prepare($sql);
        $getOne->setFetchMode(PDO::FETCH_OBJ);
        $getOne->execute($data);

        return $getOne->fetchAll();
    }
}