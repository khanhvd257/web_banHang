<?php

class profile extends controller
{

    public $user;
    function __construct()
    {
        $this->user = $this->model('KhachHang');
    }

    public function index()
    {
        if (isset($_SESSION['user'])) {
            $idUser = $_SESSION['user']['userID'];
            $kq = mysqli_fetch_assoc($this->user->getDeltailUser($idUser));
            $_SESSION['page'] = "Profile";
            $this->view('MasterLayout', [
                'page' => 'content/profile',
                'dataUser' => $kq
            ]);
        }
    }
    public function editProfile()
    {

        if (isset($_SESSION['user'])) {
            $fullName = $_POST['txtEditTen'];
            $gt = $_POST['selectGioiTinh'];
            $NS = $_POST['txtEdiNgaySinh'];
            $dc = $_POST['txtEditDiaChi'];
            $email = $_POST['txtEditEmail'];
            $sdt = $_POST['txtEditSDT'];
            $idUser = $_SESSION['user']['userID'];
            $re = $this->user->EditUser($idUser, $fullName,$gt,$NS,$dc,$email,$sdt);
            var_dump($re);
                $kq = mysqli_fetch_assoc($this->user->getDeltailUser($idUser));
                $_SESSION['page']= "Profile";
                $this->view('MasterLayout',[
                    'page'=>'content/profile',
                    'dataUser'=> $kq
                ]);      
        }
    }
}
