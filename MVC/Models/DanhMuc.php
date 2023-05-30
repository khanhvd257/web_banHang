<?php
include_once "./MVC/Config/APIHelper.php";

class DanhMuc extends ConnectDB
{
    private $apiCon;

    function __construct()
    {
        $this->apiCon = new APIHelper();
    }

    public function getAll()
    {
        $method = 'GET';
//        $params = array(
//            'id' => $productId
//        );
//        $queryString = http_build_query($params);
        $endpoint = 'category/getAll.php';
//        return $this->apiCon->callAPI($endpoint, $method);
//        $sql = "SELECT * FROM tblDanhMuc ";
//        $kq=mysqli_query($this->con,$sql);
//        return $kq;
    }

    public function getNameCate($id)
    {
        $method = 'GET';
        $params = array(
            'id' => $id
        );
        $queryString = http_build_query($params);
        $endpoint = 'category/getDetail.php?' . $queryString;
        return $this->apiCon->callAPI($endpoint, $method);

    }

    public function getByID($Id)
    {
        $method = 'GET';
        $params = array(
            'categoryId' => $Id
        );
        $queryString = http_build_query($params);
        $endpoint = 'product/getDetail.php?' . $queryString;
        return $this->apiCon->callAPI($endpoint, $method);
//        $sql = "SELECT * FROM tblDanhMuc WHERE danhMucID ='$ID'";
//        $kq=mysqli_query($this->con,$sql);
//        return $kq;
    }

}

?>
