<?php
$tongTien=0;
foreach ($data['dataMua'] as $row) {
    $tongTien += ($row['tongSL'] * $row['giaSanPham']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="http://localhost/BTL_WEB/public/Css/profile.css">
    <link rel="stylesheet" href="http://localhost/BTL_WEB/public/plugins/font-awesome-4.7.0/css/font-awesome.css">

</head>

<body>

    <div class="page-content page-container" id="page-content">
        <div class="padding">
            <div class="row container d-flex justify-content-center">
                <div class="col-md-12">
                    <form action="http://localhost/BTL_WEB/profile/editProfile" method="post">
                        <div class="card user-card-full">
                            <div class="row m-l-0 m-r-0">
                                <div class="col-sm-4 bg-c-lite-green user-profile">
                                    <div class="card-block text-center text-white">
                                        <div class="m-b-25">
                                            <img src="http://localhost/BTL_WEB/public/img/avatarDefautl.jpeg" class="img-radius" alt="User-Profile-Image">
                                        </div>
                                        <input disabled name="txtEditTen" class="f-w-600 m-b-10 inputCss " style="  background: none;  border: none;  color: white;   FONT-SIZE: 22PX;   font-family: monospace;
                                     letter-spacing: 2px; text-align: center;" value="<?php echo $data['dataUser'][0]['fullName'] ?>" />
                                        <span class="badge badge-success" style="font-size: 16px;">Đang hoạt động</span>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="card-block">
                                        <div class="row" style="justify-content: space-between;">
                                            <div class="col-sm-8">
                                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Thông tin cơ bản</h6>
                                            </div>
                                            <div class="col-sm-4" style="display: flex;">
                                                <button id="btnEDIT" type="button" class="btn btn-primary btnEdit1" onclick="enableForm()">Chỉnh sửa</button>
                                                <button id="btnHUY" type="button" class="btn btn-danger btnEdit" style="display: none ;" onclick="disableForm()">Hủy</button>
                                                <button id="btnLUU" type="submit" class="btn btn-success btnEdit" style="display: none ;">Lưu</button>

                                            </div>
                                        </div>
                                        <div class="row" style="justify-content: space-between;">
                                            <div class="col-sm-3">
                                                <p class="m-b-10 f-w-600">Tên đăng nhập</p>
                                                <input disabled class="text-muted f-w-400" id="1xx" value="<?php echo $data['dataUser'][0]['loginName'] ?>" />
                                            </div>
                                            <div class="col-sm-3" style="TEXT-ALIGN: center;">
                                                <p class="m-b-10 ">Loại Tài khoản</p>
                                                <input disabled name="" class="text-muted txt_cennter" value="<?php if (($data['dataUser'][0]['roleName']) == 0) echo "User";
                                                                                                                else echo "Admin"  ?>" />

                                            </div>
                                            <div class="col-sm-3" style="text-align: center;">
                                                <p class="m-b-10 ">Giới tính</p>
                                                <select class="inputCss" disabled name="selectGioiTinh">
                                                    <option value="0">Nữ</option>
                                                    <option <?php if (($data['dataUser'][0]['gioiTinh']) == 1) echo "selected"; ?> value="1">Nam</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-3" style="text-align: center;">
                                                <p class="m-b-10 ">Ngày sinh</p>
                                                <input disabled type="date" name="txtEdiNgaySinh" class=" inputCss text-muted txt_cennter" value="<?php echo $data['dataUser'][0]['ngaySinh'] ?>" />
                                            </div>
                                        </div>
                                        <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Thông tin liên hệ</h6>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <p class="m-b-10 f-w-600">Địa chỉ</p>
                                                <input disabled name="txtEditDiaChi" class=" inputCss text-muted f-w-400" value="<?php echo $data['dataUser'][0]['diaChi'] ?>" />
                                            </div>
                                            <div class="col-sm-4">
                                                <p class="m-b-10 f-w-600">Số điện thoại</p>
                                                <input disabled type="number" name="txtEditSDT" class=" inputCss text-muted f-w-400" value="<?php echo $data['dataUser'][0]['soDienThoai'] ?>" />
                                            </div>
                                            <div class="col-sm-4">
                                                <p class="m-b-10 f-w-600">Email</p>
                                                <input disabled name="txtEditEmail" type="email" class=" inputCss text-muted f-w-400" value="<?php echo $data['dataUser'][0]['email'] ?>" />
                                            </div>
                                        </div>
                                        <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Thông tin mua hàng</h6>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Tổng số Đơn đã mua</p>
                                                <h6><?php echo ($data['dataMua']['total']) ?></h6>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Tổng số Tiền đã mua</p>
                                                <span class="giaSP " id="tongTienProfile">
                                                    <?php if($tongTien >0){
                                                        echo $tongTien;
                                                        }else{
                                                        echo "0";
                                                        }?>

                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

<script>
    function enableForm() {
        document.get
        var a = document.getElementsByClassName("inputCss")
        for (let i = 0; i < a.length; i++) {
            a[i].style.border = "1px solid RED";
            a[i].disabled = false;
        }
        var b = document.getElementById('btnEDIT');
        b.style.display = 'none';
        var c = document.getElementById('btnHUY');
        c.style.display = 'block';
        var d = document.getElementById('btnLUU');
        d.style.display = 'block';
    }

    function disableForm() {
        document.get
        var a = document.getElementsByClassName("inputCss")
        for (let i = 0; i < a.length; i++) {
            a[i].style.border = "none";
            a[i].disabled = true;
        }
        var b = document.getElementById('btnEDIT');
        b.style.display = 'block';
        var c = document.getElementById('btnHUY');
        c.style.display = 'none';
        var d = document.getElementById('btnLUU');
        d.style.display = 'none';
    }
</script>

</html>
