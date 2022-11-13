<?php
class KhachHang extends ConnectDB{

    public function getAll(){
        $sql = "SELECT * FROM tblUsers ";
        $kq=mysqli_query($this->con,$sql);
        
        return $kq;
    }
    public function loginuser($user, $pass){
        $sql = "SELECT * FROM tblUsers WHERE loginName= '$user' AND password= '$pass'";
        $kq=mysqli_query($this->con,$sql);
        return $kq;
    }

    
}

?>