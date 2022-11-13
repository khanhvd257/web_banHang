<?php
class Home extends controller{
    public $product;
    public $order;
    function __construct()
    {
        unset($_SESSION['pageSub']);
        $_SESSION['page']= "Home";
        $this->product = $this->model('SanPham');
        $this->order = $this->model('OrderSP');
    }
    function index(){
        $result1='';
        $result = $this->product->getAll();
        if(isset($_SESSION['user']['userID'])){
            $result1 = $this->order->getAll($_SESSION['user']['userID']);
        }
        $this->view('MasterLayout',[
            'page'=>'content/product',
            'dataProduct' => $result,
            'dataOrder' => $result1
        ]);
    }  
}

?>