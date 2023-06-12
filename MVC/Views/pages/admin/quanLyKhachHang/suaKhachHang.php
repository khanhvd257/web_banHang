<?php
//tao ket noi 
include_once "../quanLyKhachHang/API/APIHelper.php";
$apiCon = new APIHelper();
$con = mysqli_connect('localhost', 'root', '', 'shopBanHang');
$thongbao = '';
$kq = '';
$userID = '';
$loginName = '';
$password = '';
$fullName = '';
$gioiTinh = '';
$soDienThoai = '';
$email = '';
$diaChi = '';
$ngaySinh = '';
if (isset($_GET['userID'])) {
	$userID = $_GET['userID'];
	$method = 'GET';
	$endpoint = 'KhachHang/getSingle.php?id=' . $userID;
	$kq1 = $apiCon->callAPI($endpoint, $method)["data"][0];
	// var_dump($row);
	$userID = $kq1['userID'];
	$loginName = $kq1['loginName'];
	$password = $kq1['password'];
	$fullName = $kq1['fullName'];
	$gioiTinh = $kq1['gioiTinh'];
	$soDienThoai = $kq1['soDienThoai'];
	$email = $kq1['email'];
	$diaChi = $kq1['diaChi'];
	$ngaySinh = $kq1['ngaySinh'];
}

if (isset($_POST['btnLuu'])) {
	
	$loginName = $_POST['txtloginName'];
	$password = $_POST['txtpassword'];
	$fullName = $_POST['txtfullName'];
	$gioiTinh = $_POST['txtgioiTinh'];
	$soDienThoai = $_POST['txtsoDienThoai'];
	$email = $_POST['txtemail'];
	$diaChi = $_POST['txtdiaChi'];
	$ngaySinh = $_POST['txtngaySinh'];
	$endpoint = 'auth/updateUser.php';
	$method = 'PUT';
	$data = array(
		'userId' => $userID,
		'ngaySinh' => $ngaySinh,
		'gioiTinh' =>$gioiTinh,
		'password' => $password,
		'email' => $email,
		'soDienThoai' => $soDienThoai,
		'fullName' => $fullName,
		'diaChi'=> $diaChi
	);
	$kq = $apiCon->callAPI($endpoint, $method, $data);
	var_dump($kq);
	if ($kq) {
		$thongbao = "Sửa thành công";
		header('Location: qlKhachHang.php');
		die();
	} else $thongbao = "Sửa thất bại";
}

?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SỬA KHÁCH HÀNG</title>
	<style type="text/css">
		* {
			margin: 0px;
		}

		.header {
			height: 100px;
			background-color: #CCAACB;
			text-align: center;
			padding-top: 35px;
		}

		.menu {
			height: 40px;
			background: #97C1A9;
		}

		.menu>ul>li {
			list-style: none;
			padding: 10px 20px 10px 20px;
			display: inline-block;
			position: relative;
			/*quan he cha con*/
		}

		a {
			color: #e8f1f2;
			text-decoration: none;
		}

		.menu ul li:hover {
			background: #1b98e0;
			transition: all 0.25s;

		}

		.content1 {
			height: 500px;
			width: 180px;
			background: #FFAEA5;
			float: left;
			color: #e8f1f2;
		}

		.content1 .con_content1 {
			list-style: none;
			padding-inline-start: 0px;
		}

		.content1 .con_content1 li {
			padding: 10px 10px;
			border-bottom: dotted 1px #e8f1f2;

		}

		.content1 .con_content1 li:hover {
			background: #1b98e0;
			transition: all 0.25s;
		}

		#logo_Shop {
			width: 200px;
			height: 190px
		}

		.logo_contenner {
			display: flex;
			font-family: monospace;
			flex-direction: row;
			justify-content: space-between;
			align-items: center;
			top: 50px;
			position: fixed;
			transform: translateY(-50%);
			left: 15px;
		}

		.table {
			border-color: pink;
			border: 0ch;
		}

		.table .thead-dark th {
			width: 150px;
			color: white;
			background-color: pink;
			border-color: pink;
		}

		.table td,
		.table th {
			padding: .75rem;
			vertical-align: top;
			border-top: 1px solid #dee2e6;
		}

		.col1 {
			width: 15%;
			color: black;
			padding-left: 25px;
			font-size: 24px;
		}

		.col2 {
			width: 35%;
		}

		.dd1 {
			width: 50%;
			height: 25px;
		}

		.dd2 {
			width: 50%;
			height: 25px;
		}

		tr {
			height: 35px;
		}
	</style>

</head>

<body>
	<div class="header">
		<nav>
			<div class="logo_contenner">
				<img id="logo_Shop" src="http://localhost:/BTL_WEB/public/img/LOGO.png">
				<h1> TRANG QUẢN LÝ KHÁCH HÀNG</h1>
			</div>
		</nav>
	</div>
	<div class="menu">
		<ul>
			<li><a href="http://localhost/BTL_WEB/MVC\Views\pages\admin\quanLyKhachHang\qlKhachHang.php">Trang chủ</a></li>
			<li><a href="http://localhost/BTL_WEB/MVC\Views\pages\admin\quanLyKhachHang\KhachHang.php">Thêm</a></li>
			<li><a href="http://localhost/BTL_web/admin"><i class="fa fa-sign-out" aria-hidden="true"></i>Thoát</a></li>
		</ul>
	</div>
</body>

<body>
	<form method="post">
		<table class="table" width="100%" style="padding-top: 50px;">
			<caption style="padding-top: 50px;font-size: 24px;"> SỬA THÔNG TIN KHÁCH HÀNG</caption>
			<tr>
				<td class="col1">UserID</td>
				<td>
					<input class="dd1" type="text" name="txtuserID" disabled
					 value="<?php echo $kq1['userID'] ?>" disable>
				</td>
				<td class="col1">Login Name</td>
				<td>
					<input class="dd1" type="text" name="txtloginName" value="<?php echo $kq1['loginName'] ?>" disable>
				</td>
			</tr>
			<tr>
				<td class="col1">Password</td>
				<td>
					<input class="dd2" type="text" name="txtpassword" value="<?php echo $kq1['password'] ?>">
				</td>
				<td class="col1">Full Name</td>
				<td>
					<input class="dd2" type="text" name="txtfullName" value="<?php echo $kq1['fullName']  ?>">
				</td>
			</tr>
			<tr>
				<td class="col1">Giới Tính </td>
				<td>
					<select class="dd2" name="txtgioiTinh">
						<option value="1">Nam</option>
						<option value="0">Nữ</option>
					</select>
				</td>
				<td class="col1">Số Điện Thoại</td>
				<td>
					<input class="dd1" type="text" name="txtsoDienThoai" value="<?php echo $kq1['soDienThoai'] ?>">
				</td>
			</tr>
			<tr>
				<td class="col1">Email</td>
				<td>
					<input class="dd2" type="text" name="txtemail" value="<?php echo $kq1['email'] ?>">
				</td>
				<td class="col1">Địa Chỉ</td>
				<td>
					<input class="dd2 " type="text" name="txtdiaChi" value="<?php echo $kq1['diaChi'] ?>">
				</td>
			</tr>
			<tr>
				<td class="col1">Ngày sinh</td>
				<td>
					<input class="dd1" type="date" name="txtngaySinh" value="<?php echo $kq1['ngaySinh'] ?>">
				</td>

			<tr>
				<td colspan="2" style=" text-align : center;"></td>
				<td>
					<input class="dd1" type="submit" name="btnLuu" value="Lưu">
				</td>
			</tr>
		</table>
	</form>
	</div>
</body>

</html>