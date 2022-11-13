<?php
class Product extends controller
{
    public $sanpham;
    function __construct()
    {
        $this->sanpham = $this->model('SanPham');
    }
    public function Detail($id)
    {

        $result = $this->sanpham->getDetail($id);
        $this->view('MasterLayout', [
            'page' => 'content/chiTietSanPham', 'data' => $result
        ]);
    }
    public function DanhMuc($id)
    {
        $result = $this->sanpham->getByCategory($id);
        $this->view('MasterLayout', [
            'page' => 'content/danhMuc',
            'data' => $result
        ]);
    }
    public function DaMua()
    {
        if (isset($_SESSION['user'])) {
            $idUser =$_SESSION['user']['userID'];
            $result = $this->sanpham->hangDaThanhToan($idUser);
            $this->view('MasterLayout', [
                'page' => 'content/daThanhToan',
                'dataThanhToan' => $result
            ]);
        }
    }
}
