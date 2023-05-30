<?php
include_once "./MVC/Config/APIHelper.php";

class OrderSP extends ConnectDB
{
    private $apiCon;

    function __construct()
    {
        $this->apiCon = new APIHelper();
    }
    public function getAll($idUser)
    {
        $method = 'GET';
        $endpoint = 'order/getOrder.php?' . 'userId=' . $idUser;
        return $this->apiCon->callAPI($endpoint, $method);
    }

    public function addOneOrder($productId)
    {

        $endpoint = 'order/add.php';
        $method = 'POST';
        $data = array(
            'productId' => $productId,
            'soLuong' => '1',
            'userID' => $_SESSION['user']['userID']
        );
        return $this->apiCon->callAPI($endpoint, $method, $data);

    }

    // HAM ORDER SAN PHẨM NHẬP SỐ LƯỢNG

    public function addMultiOrder($idProduct, $soLuong, $userID)
    {
        $sql = "INSERT INTO `tblOrder`( `ngayOrder`, `soLuong`, `userID`, `productID`, `payStatus`) VALUES (now(),'$soLuong','$userID','$idProduct','0')";
        $kq = mysqli_query($this->con, $sql);
        return $kq;
    }
    public function ThanhToanSauKhiSua($productId)
    {

        $endpoint = 'order/thanhToan.php';
        $method = 'PUT';
        $data = array(
            'productId' => $productId,
            'userId' => $_SESSION['user']['userID']
        );
        return $this->apiCon->callAPI($endpoint, $method, $data);
    }

    //HÀM DELETE SẢN PHẨM ORDER
    public function deleOrder($userID,$idProduct)
    {
            $sql = "DELETE FROM `tblOrder` WHERE productID = '$idProduct' AND userID = '$userID' ";
            $kq = mysqli_query($this->con, $sql);
    }


    //HÀM THANH TOÁN SP

    public function UpdateOrder()
    {

        if (isset($_POST['btnOrder'])) {
            $arrOrder = $_POST['strOrder'];
            $arr = explode('_', $_POST['strOrder']);
            foreach ($arr as $idProduct) {
                $sql = "UPDATE tblOrder SET `payStatus` = '1' WHERE productID = '$idProduct'";
                $kq = mysqli_query($this->con, $sql);
            }
        }
    }

    //
}
