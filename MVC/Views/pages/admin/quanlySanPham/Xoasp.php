

 <?php
    $con  = mysqli_connect ('localhost', 'root','','shopQuanAo_btlWeb');
    
    if(isset($_GET['productID'])){
        $productID=$_GET['productID'];
        $sql="delete from tblproducts Where productID = '$productID'";
        $kq= mysqli_query($con, $sql);
       if ($kq){
        echo "<script> alret('Dữ liệu đã được xóa'); </script>";
        header('Location:qlSanPham.php');
        die();
       }
       else {
        echo "<script> alret('Dữ liệu chưa được xóa'); </script>";
       }
    }
?>