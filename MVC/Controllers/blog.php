<?php 
class Blog extends controller{

    public $blogg;

    function __construct()
    {
        $this->blogg = $this->model('BlogModel');
    }
    public function index(){
        $result = $this->blogg->getAll();
        $_SESSION['page']= "Blog";
        $this->view('MasterLayout', [
            'page' => 'content/blog',
            'dataBlog'=> $result 
        ]);
    }

    public function detailBlog($idBlog){
        $result = $this->blogg->getByID($idBlog);
        $result1 = $this->blogg->getOtherBlog($idBlog);
        $_SESSION['page']= "Blog";
        $this->view('MasterLayout', [
            'page' => 'content/chiTietBlog',
            'dataBlog'=> $result ,
            'AllBlog'=> $result1
        ]);
    }

}

?>