<?php
require_once "./Classes/PHPExcel.php";
include_once "../quanLyKhachHang/API/APIHelper.php";
$apiCon = new APIHelper();
$con = mysqli_connect('localhost', 'root', '', 'shopBanHang');
if (isset($_POST['btnTimkiem'])) {
    // code...
    $usersID = $_POST['txtusersID'];
    $loginName = $_POST['txtloginName'];
    $soDienThoai = $_POST['txtsoDienThoai'];
    $gioiTinh = $_POST['txtgioiTinh'];
    $method = 'GET';
    $params = array(
        'id' => $usersID,
        'loginName' => $loginName,
        'soDienThoai'=>$soDienThoai,
        'gioiTinh' => $gioiTinh
    );
    $queryString = http_build_query($params);
    $endpoint = 'KhachHang/timKiem.php'. '?'.$queryString;
    $result = $apiCon->callAPI($endpoint, $method);

} else {
    $method = 'GET';
    $endpoint = 'KhachHang/getAll.php';
    $result = $apiCon->callAPI($endpoint, $method);
}

if(isset($_POST['btnXuatexcel'])){
    $objExcel=new PHPExcel();
    $objExcel->setActiveSheetIndex(0);
    $sheet=$objExcel->getActiveSheet()->setTitle('quanliUsers');
    $rowCount=1;
    //Tạo tiêu đề cho cột trong excel
    $sheet->setCellValue('A'.$rowCount,'userID');
    $sheet->setCellValue('B'.$rowCount,'loginName');
    $sheet->setCellValue('C'.$rowCount,'status');
    $sheet->setCellValue('D'.$rowCount,'fullName');
    $sheet->setCellValue('E'.$rowCount,'password');
    $sheet->setCellValue('F'.$rowCount,'gioiTinh');
    $sheet->setCellValue('G'.$rowCount,'soDienThoai');
    $sheet->setCellValue('H'.$rowCount,'email');
    $sheet->setCellValue('I'.$rowCount,'diaChi');
    $sheet->setCellValue('J'.$rowCount,'ngaySinh');
    $sheet->setCellValue('K'.$rowCount,'roleName');


    //định dạng cột tiêu đề
    $sheet->getColumnDimension('A')->setAutoSize(true);
    $sheet->getColumnDimension('B')->setAutoSize(true);
    $sheet->getColumnDimension('C')->setAutoSize(true);
    $sheet->getColumnDimension('D')->setAutoSize(true);
    $sheet->getColumnDimension('E')->setAutoSize(true);
    $sheet->getColumnDimension('F')->setAutoSize(true);
    $sheet->getColumnDimension('G')->setAutoSize(true);
    $sheet->getColumnDimension('H')->setAutoSize(true);
    $sheet->getColumnDimension('I')->setAutoSize(true);
    $sheet->getColumnDimension('J')->setAutoSize(true);
    $sheet->getColumnDimension('K')->setAutoSize(true);
    //gán màu nền
    $sheet->getStyle('A1:K1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('00FF00');
    //căn giữa
    $sheet->getStyle('A1:K1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    //Điền dữ liệu vào các dòng. Dữ liệu lấy từ DB
       $sql="SELECT * FROM tblusers";
       $kq=mysqli_query($con, $sql);
   
    while($row=mysqli_fetch_array($kq)){
        $rowCount++;
        $sheet->setCellValue('A'.$rowCount,$row['userID']);
        $sheet->setCellValue('B'.$rowCount,$row['loginName']);
        $sheet->setCellValue('C'.$rowCount,$row['status']);
        $sheet->setCellValue('D'.$rowCount,$row['fullName']);
        $sheet->setCellValue('E'.$rowCount,$row['password']);
        $sheet->setCellValue('F'.$rowCount,$row['gioiTinh']);
        $sheet->setCellValue('G'.$rowCount,$row['soDienThoai']);
        $sheet->setCellValue('H'.$rowCount,$row['email']);
        $sheet->setCellValue('I'.$rowCount,$row['diaChi']);
        $sheet->setCellValue('J'.$rowCount,$row['ngaySinh']);
        $sheet->setCellValue('K'.$rowCount,$row['roleName']);


    }
    //Kẻ bảng 
    $styleAray=array(
        'borders'=>array(
            'allborders'=>array(
                'style'=>PHPExcel_Style_Border::BORDER_THIN
            )
        )
        );
    $sheet->getStyle('A1:'.'K1'.($rowCount))->applyFromArray($styleAray);
    $objWriter=new PHPExcel_Writer_Excel2007($objExcel);
    $fileName='ExportExcel.xlsx';
    // $objWriter->save($fileName);
    header('Content-Disposition: attachment; filename="'.$fileName.'"');
    header('Content-Type: application/vnd.openxlmformatsofficedocument.speadsheetml.sheet');
    header('Content-Length: '.filesize($fileName));
    header('Content-Transfer-Encoding:binary');
    header('Cache-Control: must-revalidate');
    header('Pragma: no-cache');
    readfile($fileName);
    }

?>





<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quản lý Khách hàng</title>
    <style type="text/css">
        *{
            margin:0px ;
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
            position: relative; /*quan he cha con*/
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
    #logo_Shop{
    width: 200px;
    height: 190px
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

    }
    .table{
        border-color: pink;
        border: 0ch;
    }
    .table .thead-dark th {
    width: 150px;
    color: white;
    background-color: pink;
    border-color: pink;
    }
    .table td,.table th {
    padding: .75rem;
    vertical-align: top;
    border-top: 1px solid #dee2e6;
}
        .col1{width: 15%; color: black;padding-left: 25px;font-size: 24px;}
        .col2{width: 35%;}
        .dd1{width: 50%; height: 25px;}
        .dd2{width: 50%; height: 25px;}
        tr{height: 35px;}
</style>

</head>

<body>
    
    <div class="header">
    <nav>
        <div class ="logo_contenner">
            <img id="logo_Shop" src="http://localhost:/BTL_WEB/public/img/LOGO.png">
            <h1> TRANG QUẢN LÝ KHÁCH HÀNG</h1>
        </div>
    </nav>
    </div>
    
    <div class="menu">
        <ul>
            <li><a href="">Trang chủ</a></li>
            <li><a href="http://localhost/BTL_WEB/MVC/Views/pages/admin/quanLyKhachHang\KhachHang.php">Thêm</a></li>
            <li><a href="http://localhost/BTL_web/admin"><i class="fa fa-sign-out" aria-hidden="true"></i>Thoát</a></li>
        </ul>
    </div>
    
    
</body>
</html>




<div class="menu2">
    <form method="post" action="">
        <table class="table" width="100%">
            <tr style="background: greenyellow;">
                <caption style="padding-top: 20px;font-size: 24px;">THÔNG TIN TÌM KIẾM KHÁCH HÀNG</caption>
            <tr>
                <td class="col1">User ID </td>
                <td class="dd1"><input class="dd1" type="text" name="txtusersID"></td>

                <td class="col1">Login Name</td>
                <td class="dd1"><input class="dd1" type="text" name="txtloginName"></td>
            </tr>
            <tr>
                <td class="col1">Số Điện Thoại</td>
                <td class="col2"><input class="dd1" type="text" name="txtsoDienThoai"></td>

                <td class="col1">Giới tính</td>
                <td>
                    <select class="dd2" name="txtgioiTinh">
                        <option value="">--Chọn giới tính--</option>
                        <option value="1">Nam</option>
                        <option value="0">Nữ</option>
                        <option value="Khác">Khác</option>
                    </select>
                </td>
            <tr>
                <td colspan="4" style=" text-align : center;">
                    <button type="submit" name="btnTimkiem">
                        <img src="">Tìm kiếm </button> &nbsp;&nbsp;&nbsp;&nbsp;
                    <button type="submit" name="btnXuatexcel">
                        <img src="">Xuất Excel </button> &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
            </tr>
        </table>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        <table class="table" border="1" cellspacing="1" width="100%" >
           <thead class="thead-dark" style="text-align: center;">
            <tr>
                <caption style="padding-top: 20px;font-size: 24px;">DANH SÁCH KHÁCH HÀNG</caption>
                <th>User ID</th>
                <th>Login Name</th>
                <th>Password</th>
                <th>Status</th>
                <th>Full Name</th>
                <th>Giới tính</th>
                <th>Số Điện Thoại</th>
                <th>Email</th>
                <th>Địa chỉ</th>
                <th>Ngày sinh</th>
                <th>Role Name</th>
                <th>Sửa</th>
                <th>Xoá</th>
            </tr>
        </thead>
        


<?php $i = 1 ?>
<?php foreach ($result["data"] as $row) : ?>
<?php if ($i % 2 == 0) : ?>
                    <td> <?php echo $row['userID'] ?></td>
                    <td> <?php echo $row['loginName'] ?></td>
                    <td> <?php echo $row['password'] ?></td>
                    
                    <?php if ($row['status'] == 1) : ?>
                        <td>Đang Hoạt Động</td>
                    <?php endif ?>
                    <?php if ($row['status'] == 0) : ?>
                        <td>Khóa</td>
                    <?php endif ?>
                    <td> <?php echo $row['fullName'] ?></td>
                    <?php if ($row['gioiTinh'] == 1) : ?>
                        <td>Nam</td>
                    <?php endif ?>
                    <?php if ($row['gioiTinh'] == 0) : ?>
                        <td>Nữ</td>
                    <?php endif ?>
                    <td> <?php echo $row['soDienThoai'] ?></td>
                    <td> <?php echo $row['email'] ?></td>
                    <td> <?php echo $row['diaChi'] ?></td>
                    <td> <?php echo $row['ngaySinh'] ?></td>
                    <?php if ($row['roleName'] == 1) : ?>
                        <td>Nhân Viên</td>
                    <?php endif ?>
                    <?php if ($row['roleName'] == 0) : ?>
                        <td>Khách Hàng</td>
                    <?php endif ?>
                    <td><input type="button" name="btnSua" value="Sửa" onclick="suaKhachHang(<?php echo $row['userID'] ?>)"></td>
                    <td><a href="http://localhost/btl_web/MVC/Views/pages/admin/quanLyKhachHang/xoaKhachHang.php">
                    <input type="button" name="btnXoa" value="Xóa" onclick="xoaKhachHang(<?php echo $row['userID'] ?>)">
                    </tr>





<?php endif ?>
<?php if ($i % 2 != 0) : ?>
                    <td> <?php echo $row['userID'] ?></td>
                    <td> <?php echo $row['loginName'] ?></td>
                    <td> <?php echo $row['password'] ?></td>
                    <?php if ($row['status'] == 1) : ?>
                        <td>Đang Hoạt Động</td>
                    <?php endif ?>
                    <?php if ($row['status'] == 0) : ?>
                        <td>Khóa</td>
                    <?php endif ?>

                    <td> <?php echo $row['fullName'] ?></td>
                    <?php if ($row['gioiTinh'] == 1) : ?>
                        <td>Nam</td>
                    <?php endif ?>
                    <?php if ($row['gioiTinh'] == 0) : ?>
                        <td>Nữ</td>
                    <?php endif ?>
                    <td> <?php echo $row['soDienThoai'] ?></td>
                    <td> <?php echo $row['email'] ?></td>
                    <td> <?php echo $row['diaChi'] ?></td>
                    <td> <?php echo $row['ngaySinh'] ?></td>
                    <?php if ($row['roleName'] == 1) : ?>
                        <td>Nhân viên</td>
                    <?php endif ?>
                    <?php if ($row['roleName'] == 0) : ?>
                        <td>Khách Hàng</td>
                    <?php endif ?>

                    <td><input type="button" name="btnSua" value="Sửa" onclick="suaKhachHang(<?php echo $row['userID'] ?>)"></td>
                    <td><a href="http://localhost/btl_web/MVC/Views/pages/admin/quanLyKhachHang/xoaKhachHang.php?userID=<?php echo $row['userID']?>">
                    <input type="button" name="btnXoa" value="Xóa" onclick="xoaKhachHang(<?php echo $row['userID'] ?>)">
                    </a></td>
                    </tr>




<?php endif ?>
<?php $i++ ?>
<?php endforeach ?>
            <script type="text/javascript">
                function xoaKhachHang(userID) {
                    opt = confirm('Bạn có muốn xóa khách hàng này ko?')
                    if (!opt) {
                        return;
                    }
                    $.post('xoaKhachHang.php', {
                        'userID': userID
                    }, function(data) {
                        alert(data)
                        Location.reload()
                    })
                }
                function suaKhachHang(userID){
                    window.open("http://localhost/btl_web/MVC/Views/pages/admin/quanLyKhachHang/suaKhachHang.php?userID="+userID)
                }
            </script>
        </table>
        </body>