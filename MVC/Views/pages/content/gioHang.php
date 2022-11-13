    <style>
        .wrapOrder {
            margin: 0 16px;
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
            min-width: 30%;
            max-width: 30%;
        }

        .giaSp {
            min-width: 15%;
            max-width: 15%;
        }

        .soLuong {
            min-width: 15%;
            max-width: 15%;
        }

        .thanhTien {
            min-width: 20%;
            max-width: 20%;
        }

        .check_box {
            margin-left: 10%;
            max-width: 5%;
            min-width: 5%;
        }

        .header_content {
            text-align: center;
            font-size: x-large;
            font-family: auto;
            margin-top: 4%;
            margin-bottom: 6%;
            color: brown;
        }

        .lablecs {
            font-size: 12px;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-weight: bold;
            color: #f27474;
        }

        .datHang {
            margin: 18px;
            display: flex;
            align-items: center;
            justify-content: flex-end;
        }
    </style>
    <div class="wrap_container">
        <div class="header_content">
            DANH SÁCH SẢN PHẨM ORDER
        </div>
        <div class="wrapOrder">
            <div class="container_Item">
                <div class="check_box">

                </div>
                <div class="imgItem lablecs">HÌNH ẢNH SP</div>
                <div class="tenSP lablecs">TÊN SẢN PHẨM</div>
                <div class="giaSp lablecs">GIÁ BÁN</div>
                <div class="soLuong lablecs">SỐ LƯỢNG MUA</div>
                <div class="thanhTien lablecs">THÀNH TIỀN</div>
            </div>
            <?php while ($orderRow = mysqli_fetch_assoc($data['dataOrder'])) : ?>
                <div class="container_Item">
                    <div class="check_box">
                        <input type="checkbox" name="" id="">
                    </div>
                    <img class="imgItem" src="http://localhost/btl_web/public/img/LOGO.gif" alt="">
                    <div class="tenSP"><?php echo $orderRow['tenSanPham'] ?></div>
                    <div class="giaSp"><?php echo $orderRow['giaSanPham'] ?></div>
                    <div class="soLuong"><?php echo $orderRow['soLuong'] ?></div>
                    <div class="thanhTien"><?php echo ($orderRow['soLuong'] * $orderRow['giaSanPham']) . "$" ?></div>
                </div>
            <?php endwhile ?>
        </div>
        <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary datHang" data-toggle="modal">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"></path>
        </svg>
        ĐẶT HÀNG
    </button>
    </div>
    <!-- MODAL -->
   
    <div class="modal fade" id="modalThanhToan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>