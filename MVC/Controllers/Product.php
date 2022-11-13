<?php
class Product extends controller
{
    public $sanpham;
    public $danhmuc;
    function __construct()
    {
        unset($_SESSION['pageSub']);
        $this->sanpham = $this->model('SanPham');
    }
    public function Detail($id)
    {

        $result = $this->sanpham->getDetail($id);
        $result1 = $this->sanpham->getDetail($id);
        $tenSp = mysqli_fetch_assoc($result1);
        $_SESSION['pageSub'] = $tenSp['tenSanPham'];
        $this->view('MasterLayout', [
            'page' => 'content/chiTietSanPham',
            'data' => $result
        ]);
    }

    // LỌC SẢN PHẨM THEO DANH MỤC
    public function DanhMuc($id)
    {

        //'ấy ra tên danh mục
        $this->danhmuc = $this->model('DanhMuc');
        $tenDM = $this->danhmuc->getByID($id);
        $DMuc = mysqli_fetch_assoc($tenDM);
        $result = $this->sanpham->getByCategory($id);
        $_SESSION['page'] = $DMuc['tenDanhMuc'];
        $result = $this->sanpham->getByCategory($id);
        $this->view('MasterLayout', [
            'page' => 'content/danhMuc',
            'data' => $result
        ]);
    }
    public function DaMua()
    {
        $_SESSION['page'] = "Đã mua hàng";
        if (isset($_SESSION['user'])) {
            $idUser = $_SESSION['user']['userID'];
            $result = $this->sanpham->hangDaThanhToan($idUser);
            $this->view('MasterLayout', [
                'page' => 'content/daThanhToan',
                'dataThanhToan' => $result
            ]);
        }
    }
}
