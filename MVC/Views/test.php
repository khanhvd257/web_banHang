<?php                
include_once './MVC/config.php';
$sql = "SELECT * FROM tblProducts WHERE productID ='1'";

$kq = mysqli_query($conn, $sql);

$kq1 = mysqli_fetch_row($kq);
echo $kq['tenSanPham'];
?>