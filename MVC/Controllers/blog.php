<?php
class Blog extends controller{

    public $blog;

    function __construct()
    {
        $this->blog = $this->model('BlogModel');
    }
    public function index(){
        $result = $this->blog->getAll();
        $_SESSION['page']= "Blog";
        $this->view('MasterLayout', [
            'page' => 'content/blog',
            'dataBlog'=> $result["data"]
        ]);
    }

    public function detailBlog($blogId){
        $result = $this->blog->getByID($blogId);
        $result1 = $this->blog->getAll();
        $_SESSION['page']= "Blog";
        $this->view('MasterLayout', [
            'page' => 'content/chiTietBlog',
            'dataBlog'=> $result["data"][0] ,
            'AllBlog'=> $result1["data"]
        ]);
    }
}
?>
