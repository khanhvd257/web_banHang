<?php
class Home extends controller{
    public $product;
    function __construct()
    {
        $this->product = $this->model('SanPham');
    }
    function index(){
        $result = $this->product->getAll();
        $this->view('MasterLayout',[
            'page'=>'content/product',
            'dataProduct' => $result
        ]);
    }  
}

?>