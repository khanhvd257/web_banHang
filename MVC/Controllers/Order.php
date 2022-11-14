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
                'dataOrder' => $result
            ]);
        } else {
            header('Location: /BTL_WEB/auth');
        }
    }
    //kick vào thêm giỏ hàng
    public function orderSingle($idProduct)
    {
        if (isset($_SESSION['user'])) {
            $IdUser = $_SESSION['user']['userID'];
            $result1 = $this->order->addOneOrder($idProduct);
            $result = $this->order->getAll($IdUser);
            $this->view('MasterLayout', [
                'page' => 'content/gioHang',
                'dataOrder' => $result
            ]);
        } else {
            $this->render('login/LoginForm');
        }
    }

    //click vào đặt số lượng sản phẩm 

    public function addMultiProduct()
    {
        if (isset($_SESSION['user'])) {
            $IdUser = $_SESSION['user']['userID'];
            $idProduct = $_POST['txtIDproduct'];
            var_dump( $idProduct );
            $soLuong = $_POST['txtSLMua'];
            $result1 = $this->order->addMultiOrder($idProduct, $soLuong, $IdUser);
            $result = $this->order->getAll($IdUser);
            $this->view('MasterLayout', [
                'page' => 'content/gioHang',
                'dataOrder' => $result
            ]);
        } else {
            $this->render('login/LoginForm');
        }
    }

    //DELE ORDER
    public function HuyOrder($idProduct)
    {
        if (isset($_SESSION['user'])) {
            $IdUser = $_SESSION['user']['userID'];
            $result = $this->order->deleteOrder($idProduct);
            $result1 = $this->order->getAll($IdUser);
            $this->view('MasterLayout', [
                'page' => 'content/gioHang',
                'dataOrder' => $result1
            ]);
        } else {
            $this->render('login/LoginForm');
        }
    }
    public function thanhToan()
    {
        if (isset($_SESSION['user'])) {
            $this->order->UpdateOrder();
            $result = $this->order->getAll($_SESSION['user']['userID']);
            $this->view('MasterLayout', [
                'page' => 'content/gioHang',
                'dataOrder' => $result
            ]);
        } else {
            header('Location: /BTL_WEB/auth');
        }
    }
}
