<?php
class DanhMuc extends ConnectDB{

    public function getAll(){
        $sql = "SELECT * FROM tblDanhMuc ";
        $kq=mysqli_query($this->con,$sql);   
        return $kq;
    }
    public function getByID($ID){
        $sql = "SELECT * FROM tblDanhMuc WHERE danhMucID ='$ID'";
        $kq=mysqli_query($this->con,$sql);   
        return $kq;
    }

}

?>