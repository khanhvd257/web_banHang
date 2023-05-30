<?php 
	$con=mysqli_connect('localhost', 'root', '', 'shopBanHang');
	// var_dump($_GET['userID']);
	if (isset($_GET['userID'])) {
		// code...
		$userID=$_GET['userID'];
		$sql1="DELETE FROM tblusers Where userID='$userID'";
		// var_dump($sql);
		$kq=mysqli_query($con, $sql1);
		if ($kq) {
			echo 'Xoa thanh cong!';
			header('Location: qlKhachHang.php');
			die();
		}
		}
 ?>