<?php
class SanPham extends ConnectDB{

    public function getAll(){
        $sql = "SELECT * FROM tblProducts ";
        $kq=mysqli_query($this->con,$sql);
        return $kq;
    }
    //loc san pham theo danh muc
    public function getByCategory($id){
        $sql = "SELECT * FROM tblProducts WHERE danhMucID = '$id'";
        $kq=mysqli_query($this->con,$sql);
        return $kq;
    }
    public function getDetail($IDpro){
        $sql = "SELECT * FROM tblProducts WHERE productID = '$IDpro'";
        $kq=mysqli_query($this->con,$sql);
        return $kq;
    }
    
}

?>