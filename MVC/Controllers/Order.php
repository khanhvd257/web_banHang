<?php
class Order extends controller{

    public $order;

    function __construct()
    {
        $this->order = $this->model('OrderSP');
    }

    public function index(){
        $result = $this->order->getAll(2);
        $this->view('MasterLayout',[
            'page'=>'content/gioHang',
            'dataOrder'=>$result
        ]);
    }  
    public function orderSingle($idProduct){
        if(isset($_SESSION['user'])){
            $result = $this->order->addOneOrder($idProduct);
        }else{
            $this->render('login/LoginForm');
        }
    
    }
}
