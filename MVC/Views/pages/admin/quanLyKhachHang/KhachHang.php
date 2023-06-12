<?php
//tao ket noi 
include_once "../quanLyKhachHang/API/APIHelper.php";
$apiCon = new APIHelper();
$con = mysqli_connect('localhost', 'root', '', 'shopBanHang');
$thongbao = '';
if (isset($_GET['userID'])) {
	$userID = $_GET['userID'];
	$sql = "Select*From tblusers where userID ='$userID'";
	$kq = mysqli_query($con, $sql);
	$kq = mysqli_query($con, $sql);
	if ($kq != null || count($kq11) > 0) {
		while ($row = mysqli_fetch_array($kq)) {
			$userID = $row['userID'];
		}
	}
}
if (isset($_POST['btnLuu'])) {

	$loginName = $_POST['txtloginName'];
	$password = $_POST['txtpassword'];
	$fullName = $_POST['txtfullName'];
	$gioiTinh = $_POST['txtGioiTinh'];
	$soDienThoai = $_POST['txtsoDienThoai'];
	$email = $_POST['txtemail'];
	$diaChi = $_POST['txtdiaChi'];
	$ngaySinh = $_POST['txtngaySinh'];
	$roleName = $_POST['txtroleName'];
	$endpoint = 'KhachHang/them.php';
	$method = 'POST';
	$data = array(
		'ngaySinh' => $ngaySinh,
		'gioiTinh' =>$gioiTinh,
		'password' => $password,
		'email' => $email,
		'loginName' => $loginName,
		'roleName' =>$roleName,
		'soDienThoai' => $soDienThoai,
		'fullName' => $fullName,
		'diaChi'=> $diaChi
	);
	$kq = $apiCon->callAPI($endpoint, $method, $data);
	if ($kq) $thongbao = "Them moi thanh cong";
	else $thongbao = "Them moi that bai";
}
?>



<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>THÊM MỚI KHÁCH HÀNG</title>
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
	</div>
</body>

<body>

	<form method="post" onsubmit="return checkNull()">
		<table class="table" width="100%" style="padding-top: 50px;">
			<caption style="padding-top: 50px;font-size: 24px;">CẬP NHẬT THÔNG TIN KHÁCH HÀNG</caption>
			<?php echo $thongbao ?>
			<tr>
				<td class="col1">UserID</td>
				<td>
					<input class="dd1" type="text" name="txtusersID" values="<?php echo $userID ?>">
				</td>
				<td class="col1">Login Name</td>
				<td>
					<input class="dd1" type="text" name="txtloginName" values="<?php echo $loginName ?>">
				</td>
			</tr>
			<tr>
				<td class="col1">Password</td>
				<td>
					<input class="dd2" type="text" name="txtpassword" values="<?php echo $password ?>">
				</td>
				<td class="col1">Full Name</td>
				<td>
					<input class="dd2" type="text" name="txtfullName" values="<?php echo $status ?>">
				</td>
			</tr>
			<tr>
				<td class="col1">Giới Tính </td>
				<td>
					<select name="txtGioiTinh" id="">
						<option value="">--Gioi tinh--</option>
						<option value="1">Nam</option>
						<option value="0">Nữ</option>
					</select>
				</td>
				<td class="col1">Số Điện Thoại</td>
				<td>
					<input class="dd1" type="text" name="txtsoDienThoai" values="<?php echo $soDienThoai ?>">
				</td>
			</tr>
			<tr>
				<td class="col1">Email</td>
				<td>
					<input class="dd2" type="text" name="txtemail" values="<?php echo $email ?>">
				</td>
				<td class="col1">Địa Chỉ</td>
				<td>
					<input class="dd2 " type="text" name="txtdiaChi" values="<?php echo $diaChi ?>">
				</td>
			</tr>
			<tr>
				<td class="col1">Ngày sinh</td>
				<td>
					<input class="dd1" type="date" name="txtngaySinh" values="<?php echo $ngaySinh ?>">
				</td>
				<td class="col1">Role Name</td>
				<td>
					<select name="txtroleName" id="">
						<option value="0">User</option>
						<option value="1">Admin </option>
					</select>
				</td>



			<tr>
				<td colspan="2" style=" text-align : center;"></td>
				<td>
					<input class="dd1" type="submit" name="btnLuu" value="Lưu">
				</td>
			</tr>
			<tr>

		</table>

	</form>
	</div>

</body>
<script>
	function checkNull() {
		var a = document.getElementsByName('txtloginName');
		if (a.values.length == null) {
			alert('Nhập tên đăng nhập');
			return false;
		}
		return true;
	}
</script>

</html>