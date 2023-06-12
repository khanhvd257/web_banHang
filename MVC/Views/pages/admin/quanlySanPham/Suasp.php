<?php
//tao ket noi 
$con=mysqli_connect('localhost','root','','shopBanHang');
$thongbao='';
include_once "../quanlySanPham/API/APIHelper.php";
$apiCon = new APIHelper();

if(isset ($_GET['productID'])){
    $productID = $_GET['productID'];
	$sql="Select*From tblproducts where productID ='$productID'";
	$kq= mysqli_query($con,$sql);
	if($kq!= null){
		while ($row=mysqli_fetch_array($kq)){
			$danhMucID=$row['danhMucID'];
			$tenSanPham=$row['tenSanPham'];
			$moTaSanPham=$row['moTaSanPham'];
			$giaSanPham=$row['giaSanPham'];
			$xuatXu=$row['xuatXu'];
			$soLuongKho=$row['soLuongKho'];
			$pathImage=$row['pathImage'];

		}
		
	}
}
if(isset($_POST['btnLuu'])){
    $productID = $_GET['productID'];
	$danhMucID = $_POST['txtdanhMucID'];
    $tenSanPham=$_POST['txttenSanPham'];
    $moTaSanPham = $_POST['txtmoTaSanPham'];
    $giaSanPham = $_POST['txtgiaSanPham'];
    $xuatXu = $_POST['txtxuatXu'];
    $soLuongKho = $_POST['txtsoLuongKho'];
    $pathImage =$_POST['txtpathImage'];
    $endpoint = 'product/edit.php';
	$method = 'PUT';
    
    $data = array(
        'productID' => $productID,
        'danhMucID' => $danhMucID,
        'tenSanPham' => $tenSanPham,
        'moTaSanPham' => $moTaSanPham,
        'giaSanPham' => $giaSanPham,
        'xuatXu' => $xuatXu,
        'soLuongKho' => $soLuongKho
    );
    $kq = $apiCon->callAPI($endpoint,$method, $data);
    var_dump($kq);
		if($kq){
			$thongbao = "Sửa thành công";
			header('Location: qlSanPham.php');
			die();
		}
		else $thongbao = "Sửa thất bại";
	}

?>
<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
	.header{
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 130px;
        background:pink;
        z-index: 10;
    }
    	#logo_Shop{
    	width: 200px;
    	height: 180px
    }
    .logo_contenner{
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
    h1{
        font-family: Impact;
        font-weight: bold;
        color: white;
        font-style: italic;

    }
    .content2{
            height: 400px;
			padding-top: 150px;
			padding-left: 50px;
	}
    h2{
        font-family: Impact;
        font-weight: bold;
        color: pink;
        font-style: italic;
        padding-left: 450px;

    }
    .btn{
    	display: inline-block;
    	font-weight: 400;
    	background: pink;
    	color: white;
    	font-size: 1rem;
    	line-height: 1.5;
    	border-radius: 0.25rem;
    	border-color: pink;
    	margin-left: 600px;
        margin-top: 50px;
    }
    .mau{
        color: pink;
        padding-left: 50px;
    }
    
   .form-control {
    display: block;
    width: 90%;
    height: calc(1.5em + .75rem + 2px);
    padding: .375rem .75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: .25rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
	}
	button, input {
    overflow: visible;
	}
	button, input, optgroup, select, textarea {
    margin: 0;
    font-family: inherit;
    font-size: inherit;
    line-height: inherit;
	}


</style>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SỬA SẢN PHẨM</title>
</head>
<body>
	<div class="header">
        <nav>
        <div class ="logo_contenner">
        <img id="logo_Shop" src="http://localhost/BTL_WEB/public/img/LOGO.png">
		<h1>Quản Lý Sản Phẩm</h1>
        </div>
        </nav>
	</div>
	<form method="post">
	<div class="content2">

		<table>
			<h2>CẬP NHẬT THÔNG TIN VỀ NGÀNH HỌC</h2>
			<?php echo $thongbao ?>

		<input type="hidden" value="<?php echo $productID ?>" name="ID" id="" class="form-control" placeholder="" aria-describedby="helpId" >
        </div>
        <div class="form-group">
            <label for="title" class = " mau">Danh Mục</label>
            <input type="text" value="<?php echo $danhMucID ?>" name="txtdanhMucID" id="" class="form-control" placeholder="" aria-describedby="helpId">
        </div>
        <div class="form-group">
            <label for="title" class = " mau">Tên Sản Phẩm</label>
            <input type="text" value="<?php echo $tenSanPham ?>" name="txttenSanPham" id="" class="form-control" placeholder="" aria-describedby="helpId">
        </div>
        <div class="form-group">
            <label for="intro" class = " mau">Mô Tả Sản Phẩm</label>
            <input type="text" value="<?php echo $moTaSanPham ?>" name="txtmoTaSanPham" id="" class="form-control" placeholder="" aria-describedby="helpId">
        </div>
        <div class="form-group">
            <label for="detail" class = " mau">Gía Sản Phẩm</label>
            <input type="text" value="<?php echo $giaSanPham ?>" name="txtgiaSanPham" id="" class="form-control" placeholder="" aria-describedby="helpId">
        </div>
        <div class="form-group">
            <label for="status" class = " mau">Xuất Xứ</label>
            <input type="text" value="<?php echo $xuatXu?>" name="txtxuatXu" id="" class="form-control" placeholder="" aria-describedby="helpId">
        </div>
        <div class="form-group">
            <label for="status" class = " mau">Số Lượng</label>
            <input type="text" value="<?php echo $soLuongKho ?>" name="txtsoLuongKho" id="" class="form-control" placeholder="" aria-describedby="helpId">
        </div>
         <button class="btn "  name="btnLuu" type="submit"> SỬA </button>
        
			
		</table>
		
	</form>
</div>

</body>
</html>