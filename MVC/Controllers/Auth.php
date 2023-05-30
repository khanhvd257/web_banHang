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
//
//        $url = 'http://localhost/demo-api/api/auth/login.php';
//        $headers = [
//            'Content-Type: application/json', // Kiểu dữ liệu là JSON
//            'Authorization: Bearer your_token' // (Tuỳ chọn) Tiêu đề xác thực
//        ];
//        // Dữ liệu cần gửi
//        $data = [
//            'loginName' => $_POST['txtUser'],
//            'password' => $_POST['txtPassword']
//        ];
//
//        // Khởi tạo một yêu cầu cURL
//        $ch = curl_init($url);
//
//        // Cấu hình yêu cầu cURL cho phương thức POST
//        curl_setopt($ch, CURLOPT_POST, true);
//        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
//        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//        // Gửi yêu cầu và lấy phản hồi
//        $response = curl_exec($ch);
//
//        // Kiểm tra lỗi trong quá trình gửi yêu cầu
//        if ($response === false) {
//            $error = curl_error($ch);
//            echo $error;
//            // Xử lý lỗi
//        } else {
//            $responseArray = json_decode($response, true);
//            // var_dump($responseArray);
//            $user = $responseArray['data'];
//            $success = $responseArray['success'];
//            if ($success == true) {
//                session_start();
//                $_SESSION['user'] = $user;
//                //session login = 1 roleName(quyen han) = admin va nguoc lai;
//                // nên chỉ rõ đương dẫn cha nếu thư mục redirect thấp hơn ;
//                header('Location: /BTL_WEB/');
//            } else {
//                $this->render('login/LoginForm', [
//                    'thongBao' => "Sai tài khoản / mật khẩu",
//                    'user' => $_POST['txtUser'],
//                    'pass' => $_POST['txtPassword'],
//                ]);
//            }
//        }
//        curl_close($ch);


         if (isset($_POST['btnLogin'])) {
             $username = $_POST['txtUser'];
             $pass = $_POST['txtPassword'];
             $res = $this->user->loginUser($username, $pass);
             if ($res['success'] == true) {
                 session_start();
                 $_SESSION['user'] = $res['data'];
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
