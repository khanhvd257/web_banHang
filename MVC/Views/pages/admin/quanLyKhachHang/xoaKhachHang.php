<?php
include_once "../quanLyKhachHang/API/APIHelper.php";
$apiCon = new APIHelper();
// $con=mysqli_connect('localhost', 'root', '', 'shopBanHang');
// var_dump($_GET['userID']);
if (isset($_GET['userID'])) {
	$userID = $_GET['userID'];
	$method= 'DELETE';
	$endpoint = 'KhachHang/xoa.php?id='.$userID;
	$kq = $apiCon->callAPI($endpoint, $method);
	var_dump($kq);
	if ($kq) {
		echo 'Xoa thanh cong!';
		header('Location: qlKhachHang.php');
		die();
	}
}
