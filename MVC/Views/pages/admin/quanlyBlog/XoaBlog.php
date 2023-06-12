<?php

$_SESSION['login'] = 1;
$mysqli = new mysqli("localhost", "root", "", "shopBanHang");
$thongbao = '';
$mn = $_GET['BlogID'];
$sql = " DELETE FROM tblblog WHERE idBlog = '$mn'";
$kq = mysqli_query($mysqli, $sql);
header('Location: Blog.php');
die();
$blogId = $_GET['BlogID'];
$method= 'DELETE';
$endpoint = 'blog/delete.php?id='.$blogId;
$kq = $apiCon->callAPI($endpoint, $method);
if ($kq) {
    echo "<script> alret('Dữ liệu đã được xóa'); </script>";
    header('Location:qlSanPham.php');
    die();
} else {
    echo "<script> alret('Dữ liệu chưa được xóa'); </script>";
}

?>
