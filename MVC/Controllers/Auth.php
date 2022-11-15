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
            $result = $this->user->loginUser($username, $pass);
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
                $this->render('login/LoginForm', [
                    'thongBao' => "Sai tài khoản / mật khẩu",
                    'user' => $username,
                    'pass' => $pass
                ]);
            }
        }
    }
    function logout()
    {
        header("Location: /BTL_WEB/MVC/Views/pages/login/dangxuat.php");
    }
    function Register()
    {
        $this->render('login/Register', []);
    }
    function HandleRegister()
    {
        if (isset($_POST['btnRegister'])) {
            $username = $_POST['txtUserRe'];
            $pass = $_POST['txtPasswordRe'];
            $fullName = $_POST['txtFullName'];
            $check = mysqli_num_rows($this->user->CheckDuplicateUser($username));
            if ($check > 0) {
                $this->render('login/Register', [
                    'thongBao' => "Tài khoản đã tồn tại, vui lòng chọn tài khoản mói",
                    'user' => $username,
                ]);
            } else {
                $result = $this->user->RegisterAccount($username, $pass, $fullName);
                $kq = mysqli_fetch_assoc($result);
                $_SESSION['user'] = $kq;
                header("Location: /BTL_WEB");
            }
        } else {
            header("Location: /BTL_WEB/auth");
        }
    }
}
