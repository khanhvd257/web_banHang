<?php
include_once "./MVC/Config/APIHelper.php";

class SanPham extends ConnectDB
{

    private $apiCon;
    function __construct()
    {
        $this->apiCon = new APIHelper();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM `tblProducts` ORDER BY soLuongKho DESC";
        $kq = mysqli_query($this->con, $sql);
        return $kq;
    }

    public function getAllNew()
    {
        $method = 'GET';
        $endpoint = 'product/getAll.php';
        return $this->apiCon->callAPI($endpoint, $method);
    }

    //loc san pham theo danh muc
    public function getByCategory($id)
    {

        $sql = "SELECT * FROM tblProducts WHERE danhMucID = '$id'";
        $kq = mysqli_query($this->con, $sql);
        return $kq;
    }

    public function sortAll($orderby)
    {
        $sql = "SELECT * FROM tblProducts ORDER BY giaSanPham $orderby ";
        $kq = mysqli_query($this->con, $sql);
        return $kq;
    }

    public function getByCategorySort($id, $orderby)
    {
        $sql = "SELECT * FROM tblProducts WHERE danhMucID = '$id' ORDER BY giaSanPham $orderby ";
        $kq = mysqli_query($this->con, $sql);
        return $kq;
    }

    public function getDetail($productId)
    {
        $method = 'GET';
        $params = array(
            'id' => $productId
        );
        $queryString = http_build_query($params);
        $endpoint = 'product/getDetail.php'. '?'.$queryString;
        return $this->apiCon->callAPI($endpoint, $method);

    }

    public function hangDaThanhToan($userId)
    {
        $method = 'GET';
        $params = array(
            'userId' => $userId
        );
        $queryString = http_build_query($params);
        $endpoint = 'auth/daMua.php'. '?'.$queryString;
        return $this->apiCon->callAPI($endpoint, $method);
    }

    public function TimKiemSP($strTen)
    {
        $method = 'GET';
        $params = array(
            'name' => $strTen
        );
        $queryString = http_build_query($params);
        $endpoint = 'product/search.php'. '?'.$queryString;
        return $this->apiCon->callAPI($endpoint, $method);

//        $sql = "SELECT * FROM tblProducts WHERE tenSanPham LIKE '%$strTen%' ";
//        $kq = mysqli_query($this->con, $sql);
//        return $kq;
    }


}
