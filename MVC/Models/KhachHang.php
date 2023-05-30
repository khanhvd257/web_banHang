<?php
include_once "./MVC/Config/APIHelper.php";

class KhachHang extends ConnectDB
{
    private $apiCon;

    function __construct()
    {
        $this->apiCon = new APIHelper();
    }
    public function getAll()
    {
        $sql = "SELECT * FROM tblUsers ";
        $kq = mysqli_query($this->con, $sql);
        return $kq;
    }
    public function loginUser($user, $pass)
    {
        $endpoint = 'auth/login.php';
        $method = 'POST';
        $data = array(
            'loginName' => $user,
            'password' => $pass
        );
        return $this->apiCon->callAPI($endpoint, $method, $data);
    }

    public function RegisterAccount($user, $pass, $fullName)
    {
        //đăng kí mới là user
        $sql = "INSERT INTO `tblUsers`(`loginName`, `password`, `status`, `fullName`, `gioiTinh`, `soDienThoai`, `email`, `diaChi`, `ngaySinh`, `roleName`,  `anhDaiDien`)
         VALUES ('$user','$pass','1','$fullName','1','','','Việt Nam',now(),'0', '')";
        $kq = mysqli_query($this->con, $sql);
        $sql1 = "SELECT * FROM tblUsers WHERE loginName= '$user'";
        $kq1 = mysqli_query($this->con, $sql1);
        return $kq1;
    }
    function getDeltailUser($userId)
    {
        $method = 'GET';
        $params = array(
            'id' => $userId
        );
        $queryString = http_build_query($params);
        $endpoint = 'auth/detail.php'. '?'.$queryString;
        return $this->apiCon->callAPI($endpoint, $method);

    }

    public function CheckDuplicateUser($user)
    {
        $sql = "SELECT loginName FROM `tblUsers` WHERE loginName = '$user' ";
        $kq = mysqli_query($this->con, $sql);
        return $kq;
    }

    public function EditUser($userId,$fullName,$gt,$ngaySinh,$dc,$email,$sdt)
    {
        $endpoint = 'auth/updateUser.php';
        $method = 'PUT';
        $data = array(

            'userId' => $userId,
            'ngaySinh' => $ngaySinh,
            'gioiTinh' =>$gt,
            'email' => $email,
            'soDienThoai' => $sdt,
            'fullName' => $fullName,
            'diaChi'=> $dc
        );
        return $this->apiCon->callAPI($endpoint, $method, $data);
    }
}
