<?php
if (!isset($_SESSION['user'])) {
    header('Location: /BTL_WEB/auth');
}
?>

<style>
    .wrapOrder {
        margin: 16px 16px;
    }

    .container_Item {
        border: 1px solid;
        display: flex;
        flex-direction: row;
        max-width: 100%;
        max-height: 100px;
        min-height: 100px;
        align-items: center;
        justify-content: space-around;

    }

    .container_Item:first-child {
        border-top-left-radius: 6px;
        border-top-right-radius: 6px;

    }

    .container_Item:last-child {
        border-bottom-left-radius: 6px;
        border-bottom-right-radius: 6px;
    }

    .imgItem {
        max-height: 80px;
        max-width: 15%;
        min-width: 15%;
        margin-right: 5%;
    }

    .tenSP {
        min-width: 20%;
        max-width: 20%;
    }

    .giaSp {
        min-width: 10%;
        max-width: 10%;
    }

    .soLuong {
        min-width: 10%;
        max-width: 10%;
    }

    .SLkho {
        min-width: 10%;
        max-width: 10%;
    }

    .thanhTien {
        min-width: 10%;
        max-width: 10%;
    }

    .check_box {
        margin-left: 20px;
        max-width: 5%;
        min-width: 5%;
    }

    .btn_huyOrder {
        flex-grow: 1;
        cursor: pointer;
    }

    .header_content {
        text-align: center;
        font-size: x-large;
        font-family: auto;
        margin-top: 32px;
        margin-bottom: 26px;
        color: brown;
        color: brown;
    }

    .lablecs {
        font-size: 12px;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        font-weight: bold;
        color: #f27474;
    }

    .datHang {
        min-height: 70px;
        margin: 18px;
        display: flex;
        align-items: flex-end;
        justify-content: flex-end;
        flex-direction: column;
    }

    .lablecss {
        font-size: 14px;
        font-weight: 600;
    }

    .TongMH {
        font-size: large;
    }

    #ThanhToan {
        display: flex;
        justify-content: end;
        font-size: 16px;
        font-family: none;
        color: #4735dc;
        font-weight: bolder;
        display: none;

    }

    .btn_sua_item {
        transform: translateX(35%);
    }


    .txt_center {
        text-align: center;
    }

    #btnThanhToan {
        display: none;
    }

    #btnHuy {
        display: none;

    }

    .container_order_button {
        display: flex;
        flex-direction: row;
    }
</style>
<div class="wrap_container">
    <div class="header_content">
        <?php if (mysqli_num_rows($data['dataOrder']) > 0) : ?>
            DANH SÁCH SẢN PHẨM ORDER
        <?php endif ?>
        <div class="TongMH">

            <?php if (mysqli_num_rows($data['dataOrder']) == 0) : ?>
                <h2>Không có sản phẩm để thanh toán</h2>
                <br>
                <img style="max-width: 400px;" src="http://localhost/btl_web/public/img/96758-empty-cart.gif" alt="">
                <br>
                <button type="button" onclick="location.href='http://localhost/btl_web/home'" class="btn btn-warning" style="margin-top: 36px;">ĐI MUA SẢN PHẨM NGAY THÔI NÀO</button>
            <?php endif ?>

            <?php if (mysqli_num_rows($data['dataOrder']) > 0) : ?>
                <span class="badge badge-primary">Tổng có <span style="font-weight: bolder; font-size: 16px;"><?php echo mysqli_num_rows($data['dataOrder']) ?></span> Sản phẩm đang chờ Thanh Toán</span>
            <?php endif ?>
        </div>
    </div>
    <div class="datHang">
        <?php if (mysqli_num_rows($data['dataOrder']) > 0) : ?>
            <div class="container_order_button">
                <form action="http://localhost/btl_web/order/thanhToan" id="btnThanhToan" method="post">
                    <input id="arrOrder" name="strOrder" value="" style="display: none;"></input>
                    <button type="submit" onclick="ThanhToanCheck()" name="btnOrder" class="btn btn-success">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"></path>
                        </svg>
                        Thanh Toán
                    </button>
                </form>
                <form action="http://localhost/btl_web/order/HuyOrder" id="btnHuy" method="post">
                    <button type="submit" onclick="confirmHuy()" name="" class="btn btn-danger" style="margin-left: 26px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16">
                            <path fill="currentColor" d="M7 3h2a1 1 0 0 0-2 0ZM6 3a2 2 0 1 1 4 0h4a.5.5 0 0 1 0 1h-.564l-1.205 8.838A2.5 2.5 0 0 1 9.754 15H6.246a2.5 2.5 0 0 1-2.477-2.162L2.564 4H2a.5.5 0 0 1 0-1h4Zm1 3.5a.5.5 0 0 0-1 0v5a.5.5 0 0 0 1 0v-5ZM9.5 6a.5.5 0 0 0-.5.5v5a.5.5 0 0 0 1 0v-5a.5.5 0 0 0-.5-.5Z" />
                        </svg>
                        Hủy Order
                    </button>
                </form>
            </div>
            <div id="ThanhToan"><span id="tongThanhToan"></span></div>
        <?php endif ?>
    </div>
    <?php if (mysqli_num_rows($data['dataOrder']) > 0) : ?>
        <div class="wrapOrder">
            <div class="container_Item">
                <div class="check_box">
                    <input onchange="checkAllOrder(this)" type="checkbox" class="checkAllOrder" name="order">
                </div>
                <div class="imgItem lablecs">HÌNH ẢNH SP</div>
                <div class="tenSP lablecs">TÊN SẢN PHẨM</div>
                <div class="giaSp lablecs txt_center">GIÁ BÁN</div>
                <div class="soLuong lablecs txt_center">SỐ LƯỢNG MUA</div>
                <div class="SLkho lablecs txt_center">SỐ LƯỢNG KHO</div>
                <div class="thanhTien lablecs txt_center">THÀNH TIỀN</div>
                <div class="btn_huyOrder lablecs txt_center">SỬA ORDER</div>
            </div>
            <?php while ($orderRow = mysqli_fetch_assoc($data['dataOrder'])) : ?>
                <div class="container_Item">
                    <div class="check_box">
                        <input id="<?php echo $orderRow['productID'] ?>" onchange="checkOrder()" type="checkbox" class="checkOrder" value="<?php echo ($orderRow['TongSL'] * $orderRow['giaSanPham']) ?>" name="order">
                    </div>
                    <?php if ($orderRow['pathImage'] == "") : ?>
                        <img class="imgItem lablecss" src="http://localhost/BTL_WEB/public/img/defautImg.gif" alt="gif">
                    <?php endif ?>
                    <?php if ($orderRow['pathImage'] != "") : ?>
                        <img class="imgItem lablecss" src="http://localhost/BTL_WEB/uploads/<?php echo $orderRow['pathImage'] ?>" alt="gif">
                    <?php endif ?>
                    <div class="tenSP lablecss"><?php echo $orderRow['tenSanPham'] ?></div>
                    <div class="giaSp lablecss  txt_center"><?php echo $orderRow['giaSanPham'] ?></div>
                    <div class="soLuong lablecss txt_center"><?php echo $orderRow['TongSL'] ?></div>
                    <div class="SLkho lablecss txt_center"><?php echo $orderRow['soLuongKho'] ?></div>
                    <span class="thanhTien lablecss txt_center"><?php echo ($orderRow['TongSL'] * $orderRow['giaSanPham'])  ?></span>
                    <div class="btn_huyOrder btn_sua_item">
                        <a href="http://localhost/btl_web/order/deteOrder/<?php echo $orderRow['productID'] ?>">
                            <button type="button" class="btn btn-warning btn_huy_item btn_huyOrder">
                                Sửa
                            </button>
                        </a>

                    </div>
                </div>
            <?php endwhile ?>
        </div>
    <?php endif ?>



</div>
<script>

    function suaSLDat(){
        var a = document.getElementsByClassName("")
    }
</script>