<?php
class KhachHang extends ConnectDB{

    public function getAll(){
        $sql = "SELECT * FROM tblUsers ";
        $kq=mysqli_query($this->con,$sql);
        
        return $kq;
    }
    public function loginUser($user, $pass){
        $sql = "SELECT * FROM tblUsers WHERE loginName= '$user' AND password= '$pass'";
        $kq=mysqli_query($this->con,$sql);
        return $kq;
    }

    public function RegisterAccount($user, $pass, $fullName){
        //đăng kí mới là user
        $sql ="INSERT INTO `tblUsers`(`loginName`, `password`, `status`, `fullName`, `soDienThoai`, `email`, `diaChi`, `ngaySinh`, `roleName`)
         VALUES ('$user','$pass','1','$fullName','','','',now(),'0')";
        $kq=mysqli_query($this->con,$sql);  
        $sql1 = "SELECT * FROM tblUsers WHERE loginName= '$user'";
        $kq1=mysqli_query($this->con,$sql1);
        return $kq1; 
        
    }
    public function CheckDuplicateUser($user){
        $sql ="SELECT loginName FROM `tblUsers` WHERE loginName = '$user' ";
        $kq=mysqli_query($this->con,$sql);   
        return $kq;
    }
    
}
