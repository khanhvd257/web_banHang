<?php
class OrderSp extends ConnectDB
{

    public function getAll($idUser)
    {
        $sql = "SELECT *, SUM(soLuong) as TongSL FROM tblOrder, tblProducts, tblUsers WHERE tblUsers.userID = tblOrder.userID 
        AND tblProducts.productID = tblOrder.productID AND tblOrder.userID = '$idUser' AND tblOrder.status = '0' GROUP BY tblProducts.productID ORDER BY tblOrder.orderID DESC";
        $kq = mysqli_query($this->con, $sql);
        return $kq;
    }
    

    // HAM ORDER SAN PHẨM

    public function addOneOrder($idProduct)
    {
        $userID = $_SESSION['user']['userID'];
        $sql = "INSERT INTO `tblOrder`( `ngayOrder`, `soLuong`, `userID`, `productID`, `status`) VALUES (now(),'1','$userID','$idProduct','0')";
        $kq = mysqli_query($this->con, $sql);
        return $kq;
    }
    public function addMultiOrder($idProduct)
    {
        $userID = $_SESSION['user']['userID'];
        $sql = "INSERT INTO `tblOrder`( `ngayOrder`, `soLuong`, `userID`, `productID`, `status`) VALUES (now(),'','$userID','$idProduct','0')";
        $kq = mysqli_query($this->con, $sql);
        return $kq;
    }

    //HÀM DELETE SẢN PHẨM

    public function deleteOrder($idProduct)
    {
        $sql = "DELETE FROM `tblOrder` WHERE productID = '$idProduct'";
        $kq = mysqli_query($this->con, $sql);
        return $kq;
    }

    //HÀM THANH TOÁN

    public function UpdateOrder()
    {
        if(isset($_POST['btnOrder'])){
            $arrOrder = $_POST['strOrder'];
            $arr = explode('-',$_POST['strOrder']);
            foreach($arr as $idProduct){
                $sql = "UPDATE tblOrder SET `status` = '1' WHERE productID = '$idProduct'";
                $kq = mysqli_query($this->con, $sql);
            }
        }
       
    }
}