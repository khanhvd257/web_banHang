<?php

class profile extends controller
{

    public $user;
    public $sanpham;
    function __construct()
    {
        $this->user = $this->model('KhachHang');
        $this->sanpham = $this->model('SanPham');
    }

    public function index()
    {
        if (isset($_SESSION['user'])) {
            $idUser = $_SESSION['user']['userID'];
            $kq = mysqli_fetch_assoc($this->user->getDeltailUser($idUser));
            $dataMua = $this->sanpham->hangDaThanhToan($idUser);
            $_SESSION['page'] = "Profile";
            $this->view('MasterLayout', [
                'page' => 'content/profile',
                'dataUser' => $kq,
                'dataMua' => $dataMua
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
            $re = $this->user->EditUser($idUser, $fullName, $gt, $NS, $dc, $email, $sdt);
            $dataMua = $this->sanpham->hangDaThanhToan($idUser);
            $kq = mysqli_fetch_assoc($this->user->getDeltailUser($idUser));
            $_SESSION['page'] = "Profile";
            $this->view('MasterLayout', [
                'page' => 'content/profile',
                'dataUser' => $kq,
                'dataMua' => $dataMua
            ]);
        } else {
            $this->render('login/LoginForm', []);
        }
    }
}
