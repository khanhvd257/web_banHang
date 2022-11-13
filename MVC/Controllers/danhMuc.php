<?
class danhMuc extends controller{

    public $danhmuc;
    function __construct()
    {
        $this->danhmuc = $this->model('DanhMuc');
    }
    
    public function getDanhMuc(){
        $this->danhmuc = $this->model('DanhMuc');
        $result = $this->danhmuc->getAll();
    }
}
?>