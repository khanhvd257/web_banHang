<?php
class Home extends controller{
    public $product;
    public $order;
    public $user;
    function __construct()
    {
        unset($_SESSION['pageSub']);
        $_SESSION['page']= "Home";
        $this->product = $this->model('SanPham');
        $this->order = $this->model('OrderSP');
        $this->user = $this->model('KhachHang');
    }
    function index(){
        $result = $this->product->getAllNew();
        $this->view('MasterLayout',[
            'page'=>'content/product',
            'dataProduct' => $result["data"],
        ]);
    }
    function sort(){
        $orderBy = $_POST['sortProduct'];
        $result = $this->product->sortAll($orderBy);
        // if(isset($_SESSION['user']['userID'])){
        //     $result1 = $this->order->getAll($_SESSION['user']['userID']);
        // }
        $this->view('MasterLayout',[
            'page'=>'content/product',
            'dataProduct' => $result,
        ]);
        // var_dump($result);
    }
    function Profile(){
        if(isset($_SESSION['user'])){
            $idUser = $_SESSION['user']['userID'];
            $kq = mysqli_fetch_assoc($this->user->getDeltailUser($idUser));
            $_SESSION['page']= "Profile";
            $this->view('MasterLayout',[
                'page'=>'content/profile',
                'dataUser'=> $kq
            ]);
        }

    }
}
