<?php
class Product extends controller
{
    public $sanpham;
    function __construct()
    {
        $this->sanpham = $this->model('SanPham');
    }
    public function Detail($id){
    
        $result= $this->sanpham->getDetail($id);
        $this->view('MasterLayout',[
            'page'=>'content/chiTietSanPham'
            ,'data'=> $result
        ]);
    }
    public function DanhMuc($id){
        $result= $this->sanpham->getByCategory($id);
        $this->view('MasterLayout',[
            'page'=>'content/danhMuc',
            'data'=>$result
        ]);
    }

}
