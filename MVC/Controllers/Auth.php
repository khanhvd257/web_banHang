<?php
class Auth extends controller
{

    public $user;

    function __construct()
    {
        $this->user = $this->model('KhachHang');
    }
    function index()

    {
        if (isset($_SESSION['user'])) {
            header('Location: /BTL_web');
        } else {

            $this->render('login/LoginForm', []);
        }
    }

    public function login()
    {
        if (isset($_POST['btnLogin'])) {
            $username = $_POST['txtUser'];
            $pass = $_POST['txtPassword'];

            $result = $this->user->loginuser($username, $pass);
            //CONVERT RESULT FROM DATABASE TO ARRAY USED
            $kq = mysqli_fetch_assoc($result);
            $count =  mysqli_num_rows($result);
            if ($count > 0) {
                session_start();
                $_SESSION['user'] = $kq;
                //session login = 1 roleName(quyen han) = admin va nguoc lai;
                // nên chỉ rõ đương dẫn cha nếu thư mục redirect thấp hơn ;
                header('Location: /BTL_WEB/');
            } else {
                unset($_SESSION['user']);
                $this->render('login/LoginForm');
            }
        }
    }
    function logout()
    {
        header("Location: /BTL_WEB/MVC/Views/pages/login/dangxuat.php");
    }
}
