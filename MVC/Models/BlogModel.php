<?php
class BlogModel extends ConnectDB{

    public function getAll(){
        $sql = "SELECT * FROM tblUsers,tblBlog WHERE tblBlog.userID = tblUsers.userID";
        $kq = mysqli_query($this->con,$sql);
        return $kq;
    }

    public function getByID($idBlog){
        $sql = "SELECT * FROM tblUsers,tblBlog WHERE tblBlog.userID = tblUsers.userID AND idBlog = '$idBlog'";
        $kq = mysqli_query($this->con, $sql);
        return $kq;
    }

    public function getOtherBlog($idBlog){
        $sql = "SELECT * FROM tblUsers,tblBlog WHERE tblBlog.userID = tblUsers.userID AND idBlog != '$idBlog' LIMIT 4";
        $kq = mysqli_query($this->con, $sql);
        return $kq;
    }

}

?>