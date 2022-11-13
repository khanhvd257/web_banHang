<?php
class Admin extends controller{

    function index(){
        $this->render('admin/index');
    }  
    
    function dangxuat(){
        $this -> render('login/dangxuat');
    }
}

?>