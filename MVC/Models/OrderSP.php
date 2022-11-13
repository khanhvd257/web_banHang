<?php
class OrderSp extends ConnectDB
{

    public function getAll($idUser)
    {
        $sql = "SELECT * FROM tblOrder, tblProducts , tblUsers WHERE tblUsers.userID = tblOrder.userID 
        AND tblProducts.productID = tblOrder.productID AND tblOrder.userID = '$idUser'";
        $kq = mysqli_query($this->con, $sql);
        return $kq;
    }

    public function addOneOrder($idProduct)
    {
        $timestamp = time();
        $now =  date("F d, Y h:i:s", $timestamp);
        $userID = $_SESSION['user']['userID'];
        $sql = "INSERT INTO `tblOrder`( `ngayOrder`, `soLuong`, `userID`, `productID`, `status`) VALUES ('$now','1','$userID','$idProduct','0')";
    }
    public function addMultiOrder($idProduct)
    {
        $timestamp = time();
        $now =  date("F d, Y h:i:s", $timestamp);
        $userID = $_SESSION['user']['userID'];
        $sql = "INSERT INTO `tblOrder`( `ngayOrder`, `soLuong`, `userID`, `productID`, `status`) VALUES ('$now','','$userID','$idProduct','0')";
    }
}
