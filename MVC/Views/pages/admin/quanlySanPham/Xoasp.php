 <?php
    include_once "../quanlySanPham/API/APIHelper.php";
    $apiCon = new APIHelper();

    if (isset($_GET['productID'])) {
        $productId = $_GET['productID'];
        $method= 'DELETE';
        $endpoint = 'product/delete.php?productId='.$productId;
        $kq = $apiCon->callAPI($endpoint, $method);
        if ($kq) {
            echo "<script> alret('Dữ liệu đã được xóa'); </script>";
            header('Location:qlSanPham.php');
            die();
        } else {
            echo "<script> alret('Dữ liệu chưa được xóa'); </script>";
        }
    }
    ?>