<?php

class Profile extends controller
{
    public $user;
    public $sanpham;
    function __construct()
    {
//
        $this->user = $this->model("KhachHang");
        $this->sanpham = $this->model("SanPham");
    }


    public function index()
    {
        if (isset($_SESSION['user'])) {
            $result = $this->sanpham->hangDaThanhToan($_SESSION['user']['userID']);
            $userData = $this->user->getDeltailUser($_SESSION['user']['userID']);
            $_SESSION['page'] = "Profile";
                $this->view('MasterLayout', [
                'page' => 'content/profile',
                'dataUser' => $userData["data"],
                'dataMua' => $result["data"]
            ]);
//            var_dump($userData["data"]);

        }else{
            $this->render('login/LoginForm', []);
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
            $this->user->EditUser($idUser, $fullName, $gt, $NS, $dc, $email, $sdt);
            $_SESSION['page'] = "Profile";
            header('Location:  http://localhost/BTL_WEB/profile');
        } else {
            $this->render('login/LoginForm', []);
        }
    }
}
