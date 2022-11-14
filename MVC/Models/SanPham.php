<?php
class SanPham extends ConnectDB{

    public function getAll(){
        $sql = "SELECT * FROM `tblProducts` ORDER BY soLuongKho DESC";
        $kq=mysqli_query($this->con,$sql);
        return $kq;
    }

    //loc san pham theo danh muc
    public function getByCategory($id){
        $sql = "SELECT * FROM tblProducts WHERE danhMucID = '$id'";
        $kq=mysqli_query($this->con,$sql);
        return $kq;
    }

    public function getDetail($IDpro){
        $sql = "SELECT * FROM tblProducts WHERE productID = '$IDpro'";
        $kq=mysqli_query($this->con,$sql);
        return $kq;
    }

    public function hangDaThanhToan($idUser)
    {
        $sql = "SELECT *, SUM(soLuong) as TongSL FROM tblOrder, tblProducts, tblUsers WHERE tblUsers.userID = tblOrder.userID 
        AND tblProducts.productID = tblOrder.productID AND tblOrder.userID = '$idUser' AND tblOrder.status = '1' GROUP BY tblProducts.productID ORDER BY tblOrder.orderID DESC";
        $kq = mysqli_query($this->con, $sql);
        return $kq;
    }
    
    public function TimKiemSP($strTen){
        $sql= "SELECT * FROM tblProducts WHERE tenSanPham LIKE '%$strTen%' ";
        $kq = mysqli_query($this->con, $sql);
        return $kq;
    }
    
}
