<?
class danhMuc extends controller{

    public $danhmuc;
    function __construct()
    {
        $this->danhmuc = $this->model('DanhMuc');
    }
    

}
?>