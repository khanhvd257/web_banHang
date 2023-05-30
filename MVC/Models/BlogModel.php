<?php
include_once "./MVC/Config/APIHelper.php";
class BlogModel extends ConnectDB{
    private $apiCon;
    function __construct()
    {
        $this->apiCon = new APIHelper();
    }
    public function getAll(){
        $method = 'GET';
        $endpoint = 'blog/getAll.php';
        return $this->apiCon->callAPI($endpoint, $method);
    }

    public function getByID($blogId){
        $method = 'GET';
        $endpoint = 'blog/detail.php?id='.$blogId;
        return $this->apiCon->callAPI($endpoint, $method);
    }

    public function getOtherBlog($idBlog){
        $sql = "SELECT * FROM tblUsers,tblBlog WHERE tblBlog.userID = tblUsers.userID AND idBlog != '$idBlog' ORDER BY idBlog DESC LIMIT 4";
        $kq = mysqli_query($this->con, $sql);
        return $kq;
    }

}

?>
