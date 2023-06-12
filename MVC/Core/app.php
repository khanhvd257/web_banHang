<?php
class app
{
    protected $controller;
    protected $action;
    protected $params;

    //Controller
    function __construct()
    {
        $this->controller = 'home';
        $this->action = 'index';
        $this->params = [];
        $this->Urlprocess();
        $this->fullcurrentUrl();
    }
    function fullcurrentUrl()
    {
        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
            $url = "https://";
        else
            $url = "http://";
        // Append the host(domain name, ip) to the URL.
        $url .= $_SERVER['HTTP_HOST'];

        // Append the requested resource location to the URL
        $url .= $_SERVER['REQUEST_URI'];

        //định nghĩa biến dùng chung
        define('__URLweb', $url);
    }

    function getUrl()
    {
        if (isset($_GET['url'])) {
            $url = $_GET['url'];
        } else {
            $url = '/';
        }
        return $url;
    }

    public function Urlprocess()
    {
        $url = $this->getUrl();
        $urlArr =  array_filter(explode('/', $url));
        $urlArr = array_values($urlArr);
        //Xử lí controller
        if (isset($urlArr[0])) {
            $this->controller = ucfirst($urlArr[0]); // viết hoa chữ cái đầu
        } else {
            $this->controller = ucfirst($this->controller);
        }

        if (file_exists('./MVC/Controllers/' . $this->controller . '.php')) {
            require_once './MVC/Controllers/' . $this->controller . '.php';
            if (class_exists($this->controller)) {
                $this->controller = new $this->controller;
            } else {
                $this->loadError();
            }
            unset($urlArr[0]);
        } else {
            $this->loadError();
        }
        //Xử lí action
        if (isset($urlArr[1])) {
            $this->action = $urlArr[1];
            unset($urlArr[1]);
        }

        //Xử lí param
        $this->params = array_values($urlArr);

        if (method_exists($this->controller, $this->action)) {
            call_user_func_array([$this->controller, $this->action], $this->params);
        } else {
            $this->loadError();
        }
    }

    function loadError($name = '404')
    {
        require_once './MVC/Errors/' . $name . '.php';
    }
}
