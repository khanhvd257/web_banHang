<?php 
	$con=mysqli_connect('localhost', 'root', '', 'shopquanao_btlweb');
	// var_dump($_GET['userID']);
	if (isset($_GET['userID'])) {
		// code...
		$userID=$_GET['userID'];
		$sql="DELETE FROM tblusers Where userID='$userID'";
		$kq=mysqli_query($con, $sql);
		if ($kq) {
			echo 'Xoa thanh cong!';
			header('Location: qlKhachHang.php');
			die();
		}
		}
 ?>