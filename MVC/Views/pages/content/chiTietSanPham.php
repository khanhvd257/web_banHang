<?php
$sanpham = $data['data'];
?>

<!DOCTYPE html>
<html lang="en">
<style>
    .wrap_item {
        min-height: 700px;
        display: flex;
        justify-content: center;
        margin-left: 110px;

    }

    .img_item {
        box-shadow: rgb(149 157 165 / 20%) 0px 8px 24px;
        border-radius: 12px;
        margin-top: 36px;
        max-width: 360px;
        max-height: 550px;
        min-width: 360px;
        min-height: 360px;
        transition: all 0.5s ease-out;
    }

    .img_item:hover {
        transform: scale(1.1);
        transition: all 0.4s;
    }

    /* START ZOOM ANH */

    /* END ZOOM ANH */


    .wrap_detail {
        margin-left: 4%;
        margin-top: 6%;
        display: flex;
        justify-content: flex-start;
        flex-direction: column;
        align-content: space-between;
        align-items: flex-start;
        margin-left: 4%;
    }

    .datHang {
        display: flex;
        align-content: space-between;
    }

    .title {
        text-shadow: 5px 3px 4px #f2afafd1;
        color: red;
        font-size: 35px;
        font-family: emoji;
        font-weight: 900;

    }

    .mota {
        max-width: 420px;
    }

    .moTaSP {
        margin-top: 6%;
        max-width: 666px;
    }

    .giaTien {
        display: flex;
        margin-top: 6%;
        font-size: 22px;
        font-family: monospace;
        color: darkslateblue;
        font-weight: bold;
        font-style: initial;
        text-align: right;
    }


    .btnMua {
        color: chocolate;
        position: relative;
        overflow: visible;
        outline: 0;
        background: #eeeaea;
        border: none;
        padding: 5px;
        border-radius: 8px;
        cursor: pointer;
    }

    .btnMua:hover {
        transition: all 0.4s;
        background: linear-gradient(134deg, #ed93a0, #7f4782);
        color: white;

    }

    .lablecss {
        font-size: 14px;
        font-weight: 600;
        margin: 0;
    }

    .giaSP::before {
        content: "Giá: ";
    }

    .giaSP::after {
        content: " VND";

    }

    #txtSLKho::before {
        content: "Số lượng kho: ";
    }
</style>


<body>
    <div class="wrap_item">
        <?php if ($sanpham['pathImage'] == "") : ?>
            <div class="wrap_img">
                <img class="img_item" src="http://localhost/BTL_WEB/public/img/defautImg.gif" alt="gif"></a>
            </div>
        <?php endif ?>
        <?php if ($sanpham['pathImage'] != "") : ?>
            <div class="wrap_img">
                <img class="img_item" src="http://localhost/BTL_WEB/MVC/Views/pages/admin/quanlySanPham/upload/<?php echo $sanpham['pathImage'] ?>"<?php echo $sanpham['pathImage'] ?>" alt="gif"></a>
            </div>
        <?php endif ?>
        <div class="wrap_detail">
            <form action="http://localhost/btl_web/order/addMultiProduct" name="formDatHang" method="post" onsubmit="return validateFormMuaHang()">
                <div class="title">
                    <?php echo $sanpham['tenSanPham'] ?>
                    <input type="text" name="txtIDproduct" value=" <?php echo $sanpham['productID'] ?>" style="display:none">
                </div>
                <div class="giaTien">
                    <span class="badge badge-warning giaSP "><?php echo $sanpham['giaSanPham'] ?></span>
                </div>
                <div class="moTaSP"><label class="lablecss" for="">Mô tả sản phầm: </label>

                    <?php echo $sanpham['moTaSanPham'] ?>
                    <br>

                    <label for="" class="lablecss">Xuất xứ: &nbsp;</label><?php echo $sanpham['xuatXu'] ?>
                </div>

                <div class="soLuong">
                    <label for="" id="txtSLKho" class="lablecss"><?php echo $sanpham['soLuongKho'] ?></label>
                </div>
                <div class="slDat">
                    <?php if ($sanpham['soLuongKho'] != '0') : ?>
                        <label for="" class="lablecss">Số Lượng mua&nbsp; &nbsp;</label>
                        <input type="number" placeholder="Số lượng" name="txtSLMua" aria-required="true" style="max-width: 90px; border: 0; box-shadow: rgb(100 100 111 / 20%) 0px 7px 29px 0px;">
                    <?php endif ?>
                </div>
                <div class="btnDat">
                    <?php if ($sanpham['soLuongKho'] == '0') : ?>
                        <button type="button" class="btn btn-danger">Đã cháy hàng</button>
                    <?php endif ?>
                    <?php if ($sanpham['soLuongKho'] != '0') : ?>
                        <button class="btnMua" type="submit">Đặt hàng</button> &nbsp;
                    <?php endif ?>
                </div>
            </form>
        </div>
    </div>
</body>

</html>

<script>
    function validateFormMuaHang() {
        var b = Number.parseInt(document.getElementById('txtSLKho').innerText);
        let a = document.forms["formDatHang"]["txtSLMua"].value;
        if (a == "") {
            alert("Bạn chưa nhập số lượng Mua rồi");
            return false;
        }
        if(a<=0){
            alert("Số luọng phải lớn hơn 0");
            return false;
        }
        if (a > b) {
            alert("Kho thiếu hàng rồi");
            return false;
        } else if (confirm(`Bạn chắc chắn muốn đặt số lượng sản phẩm là: ${a} chứ`)) {
            return true;
        } else {
            return false;
        }
    }
</script>
