<?php
    class controller{

        public function model($model){
            require_once "./MVC/Models/".$model.".php";
            return new $model;
        }
        public function view($view,$data=[]){
            require_once "./MVC/Views/".$view.".php";
        }

        function render($file, $data = []){
            $file_path = "./MVC/Views/pages/".$file.".php";
            if(file_exists($file_path)){
                require_once($file_path);
                // if($admin == null){
                //     require_once('Views/pages/application.php');	
                // } else {
                //     require_once('views/layouts/admin.php');
                // }
                
            } else {
                echo "Khong tim thay view";
                echo "<br>".$file_path;
            }
        }
    }
?>