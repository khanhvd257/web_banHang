<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link rel="stylesheet" type="text/css" href="http://localhost/BTL_WEB/public/plugins/bootstrap-5.2.2-dist/css/bootstrap.min.css">
  <style>
    .header-form {
      font-size: 40px;
      text-align: center;
      font-family: auto;
      margin-bottom: 6%;
    }

    .cs {
      padding-top: 1rem !important;
      padding-bottom: 3rem !important;
    }

    .background {
      background: linear-gradient(180deg, #74cff2 -15.87%, #FFFFFF 100%);
    }

    .center-content {
      transform: translateY(35%);
    }
  </style>
</head>

<body>
  <section class="vh-100" style="background-color: #9A616D;">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
          <div class="card" style="border-radius: 1rem;">
            <div class="row g-0">
              <div class="col-md-6 col-lg-5 d-none d-md-block">
                <img src="http://localhost/BTL_WEB/public/img/Loginn.gif" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem; margin-left: 20px; max-height: 700px; min-width:400px" />
              </div>
              <div class="col-md-6 col-lg-7 d-flex align-items-center">
                <div class="card-body p-4 p-lg-5 text-black">

                  <form method="post" action="http://localhost/BTL_WEB/auth/HandleRegister" name="formRegister" onsubmit="return validateFormRegister()">

                    <div class="d-flex align-items-center mb-3 pb-1">
                      <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                      <span class="h1 fw-bold mb-0">Shop quần áo KDCP</span>
                    </div>

                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Đăng kí Tài khoản mới</h5>
                    <div class="form-outline mb-4">
                      <label class="form-label" for="form2Example17">Tài khoản đăng nhập</label>
                      <input id="form2Example17" class="form-control form-control-lg" name="txtUserRe" />
                    </div>
                    <div class="form-outline mb-4">
                      <label class="form-label" for="form2Example17">Họ và tên</label>
                      <input id="form2Example17" class="form-control form-control-lg" name="txtFullName" />
                    </div>
                    <div class="form-outline mb-4">
                      <label class="form-label" for="form2Example27">Mật khẩu đăng nhập</label>
                      <input type="password" id="form2Example27" class="form-control form-control-lg" name="txtPasswordRe" />
                    </div>
                    <div class="form-outline mb-4">
                      <label class="form-label" for="form2Example27">Nhập lại Mật khẩu</label>
                      <input type="password" id="form2Example27" class="form-control form-control-lg" name="txtRepeatPassword">
                    </div>
                    <div style="margin-bottom: 10px; color:red" class="lblThongBao">
                      <span><?php echo $data['thongBao'] ?></span>
                    </div>
                    <div class="pt-1 mb-4">
                      <button class="btn btn-dark btn-lg btn-block" name="btnRegister">Đăng kí</button>
                    </div>
                    <p class="mb-5 pb-lg-2" style="color: #393f81;">Đã có tài khoản &nbsp;&nbsp;<a href="http://localhost/BTL_WEB/auth" style="color: #393f81;">Đăng nhập ngay</a></p>
                    <a href="http://localhost/BTL_WEB" class="small text-muted">Trang chủ</a>
                    <a href="#!" class="small text-muted">Privacy policy</a>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script src="http://localhost/BTL_WEB/public/Css/bootstrap4/bootstrap.min.js"></script>
</body>
<script>
  function validateFormRegister() {
    var a = document.forms.formRegister.txtPasswordRe.value;
    var b = document.forms.formRegister.txtRepeatPassword.value;
    var c= document.forms.formRegister.txtFullName.value;
    if (a === "") {
      alert("Vui lòng nhập mật khẩu");
      return false;
    }
    if (c === "") {
      alert("Vui lòng nhập Họ tên");
      return false;
    }
    if (b === "") {
      alert("Vui lòng xác nhận mật khẩu");
      return false;
    }
    if (a !== b) {
      alert("mật khẩu không khớp, kiểm tra lại");
      return false;
    }
  }
</script>

</html>