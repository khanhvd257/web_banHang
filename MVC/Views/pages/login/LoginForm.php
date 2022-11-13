


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
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
                <img src="http://localhost/BTL_WEB/public/img/Login.gif" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem; margin-left: 20px" />
              </div>
              <div class="col-md-6 col-lg-7 d-flex align-items-center">
                <div class="card-body p-4 p-lg-5 text-black">

                  <form method="post" action="http://localhost/BTL_WEB/auth/login" >

                    <div class="d-flex align-items-center mb-3 pb-1">
                      <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                      <span class="h1 fw-bold mb-0">Tiệm quần áo KDCP<br> XIN CHÀO!!!</span>
                    </div>

                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>

                    <div class="form-outline mb-4">
                      <label class="form-label" for="form2Example17">Username</label>
                      <input id="form2Example17" class="form-control form-control-lg" name="txtUser" />

                    </div>

                    <div class="form-outline mb-4">
                      <label class="form-label" for="form2Example27">Password</label>
                      <input type="password" id="form2Example27" class="form-control form-control-lg" name="txtPassword"/>
                    </div>

                    <div class="pt-1 mb-4">
                      <button class="btn btn-dark btn-lg btn-block" type="submit" name="btnLogin">Login</button>
                    </div>

                    <a class="small text-muted" href="#!">Forgot password?</a>
                    <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="#!" style="color: #393f81;">Register here</a></p>
                    <a href="#!" class="small text-muted">Terms of use.</a>
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


</html>