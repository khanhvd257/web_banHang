<?php
class Product extends controller
{
    public $sanpham;
    public $danhmuc;
    function __construct()
    {
        unset($_SESSION['pageSub']);
        $this->sanpham = $this->model('SanPham');
        $this->danhmuc = $this->model('DanhMuc');
    }
    public function Detail($id)
    {
        $result = $this->sanpham->getDetail($id);
        $_SESSION['pageSub'] = $result["data"][0]["tenSanPham"];
        $this->view('MasterLayout', [
            'page' => 'content/chiTietSanPham',
            'data' => $result["data"][0]
        ]);
    }

    // LỌC SẢN PHẨM THEO DANH MỤC
    public function DanhMuc($id)
    {

        //ấy ra tên danh mục
        $this->danhmuc = $this->model('DanhMuc');
        $tenDM = $this->danhmuc->getNameCate($id)["data"][0]["tenDanhMuc"];
        $result = $this->danhmuc->getByID($id);
        $_SESSION['page'] = $tenDM;
        $this->view('MasterLayout', [
            'page' => 'content/danhMuc',
            'data' => $result["data"],
            'total' => $result["total"],
            'idDanhMuc' => $id
        ]);
    }


    //tham số Order nhận DESC OR ASC
    public function SortDanhMuc($id)
    {

        $order = $_POST['sortProduct'];
        //'ấy ra tên danh mục
        $tenDM = $this->danhmuc->getByID($id);
        $DMuc = mysqli_fetch_assoc($tenDM);
        $result = $this->sanpham->getByCategorySort($id,$order);
        $_SESSION['page'] = $DMuc['tenDanhMuc'];
        $idDM =  $DMuc['danhMucID'];
        $this->view('MasterLayout', [
            'page' => 'content/danhMuc',
            'data' => $result,
            'idDanhMuc' =>  $idDM
        ]);
    }

    //SẢN PHẨM USER ĐÃ MUA
    public function DaMua()
    {
//
        $_SESSION['page'] = "Đã mua hàng";
        if (isset($_SESSION['user'])) {
            $userId = $_SESSION['user']['userID'];
            $result = $this->sanpham->hangDaThanhToan($userId);
            $this->view('MasterLayout', [
                'page' => 'content/daThanhToan',
                'data' => $result["data"],
                'total' => $result["total"]
            ]);

        }
    }

    // TÌM KIẾM SẢN PHẨM THEO TÊN
    public function SearchName()
    {
        if (isset($_POST['btnSearchProduct'])) {
            $stringName = $_POST['txtSearchName'];
            $result = $this->sanpham->TimKiemSP($stringName);
            $_SESSION['page'] = "Tìm kiếm" . $stringName;
            $this->view('MasterLayout', [
                'page' => 'content/product',
                'dataProduct' => $result["data"]
            ]);
        } else {
            header('Location: /BTL_WEB/home');
        }
    }
}
