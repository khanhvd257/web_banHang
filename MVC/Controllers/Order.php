<?php

class Order extends controller
{

    public $order;

    function __construct()
    {
        unset($_SESSION['pageSub']);
        $_SESSION['page'] = "Order";
        $this->order = $this->model('OrderSP');
    }

    public function index()

    {
        if (isset($_SESSION['user']['userID'])) {
            $result = $this->order->getAll($_SESSION['user']['userID']);
            $this->view('MasterLayout', [
                'page' => 'content/gioHang',
                'dataOrder' => $result["data"],
                'total' => $result["total"]
            ]);
        } else {
            header('Location: /BTL_WEB/auth');
        }
    }

    //kick vào thêm giỏ hàng
    public function orderSingle($productId)
    {
        if (isset($_SESSION['user'])) {
            $IdUser = $_SESSION['user']['userID'];

            $result = $this->order->addOneOrder($productId);
            var_dump($result);
            if ($result["success"] === true) {
                header('Location: http://localhost/BTL_WEB/order');
            } else {
                $this->render('login/LoginForm');
            }
        }
    }

    //click vào đặt số lượng sản phẩm
    public function addMultiProduct()
    {
        if (isset($_SESSION['user'])) {
            $IdUser = $_SESSION['user']['userID'];
            $idProduct = $_POST['txtIDproduct'];
            $soLuong = $_POST['txtSLMua'];
            $result1 = $this->order->addMultiOrder($idProduct, $soLuong, $IdUser);
            $result = $this->order->getAll($IdUser);
            header('Location: http://localhost/BTL_WEB/order');
        } else {
            $this->render('login/LoginForm');
        }
    }

    //DELE ORDER
    public function HuyOrder()
    {
        if (isset($_SESSION['user'])) {
            $IdUser = $_SESSION['user']['userID'];
            $idProduct = $_POST['strOrder'];
            $arrIDproduct = explode('_', $idProduct);
            for ($i = 0; $i < count($arrIDproduct); $i++) {
                $this->order->deleOrder($IdUser, $arrIDproduct[$i]);
            }
            $result1 = $this->order->getAll($IdUser);
            header('Location: http://localhost/BTL_WEB/order');
        } else {
            $this->render('login/LoginForm');
        }
    }

    public function thanhToan()
    {
        if (isset($_SESSION['user'])) {
            $idProduct = $_POST['strOrder'];
            $arrIDproduct = explode('_', $idProduct);
            $arr = [];
            for ($i = 0; $i < count($arrIDproduct); $i++) {

                $row = $this->order->ThanhToanSauKhiSua($arrIDproduct[$i]);
                array_push($arr, $row);
            }
            header('Location: http://localhost/BTL_WEB/order');
        } else {
            header('Location: http://localhost/BTL_WEB/auth');
        }
    }
}
