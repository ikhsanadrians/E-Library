<?php



include('../core/controllers/member.php');

$members = new Member;


$members->Middleware(1, 'Location:/');



if (isset($_POST['submit'])) {

  $members->Register();

}






?>

<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register - E-Library</title>

  <link rel="shortcut icon" href="../assets/images/eperpus/logo-eperpus-mini.png" type="image/x-icon" />
  <link rel="stylesheet" href="../assets/css/main/app.css" />
  <link rel="stylesheet" href="../assets/css/pages/auth.css" />
</head>

<body>
  <script src="assets/static/js/initTheme.js"></script>
  <div id="auth">
    <div class="row" style="overflow-y:hidden">
      <div class="col-lg-5 col-12">
        <div id="auth-left">
          <div class="auth-logo">
            <a href="index.html"><img src="../assets/images/eperpus/logo-eperpus.webp" alt="Logo" /></a>
          </div>
          <h3>Register.</h3>
          <p class="mb-5" style="font-size:20px;">
            Register Sebagai Member
          </p>
          <div id="confirm-pass-hint" class="alert alert-danger d-none">
          <i class="bi bi-exclamation-triangle-fill"></i> 
          Password Tidak Cocok
          </div>
          <?php if (isset($_GET['message']) && $_GET['message']): ?>
            <div class="alert alert-danger d-flex align-items-center gap-2">
              <i class="bi bi-exclamation-triangle-fill"></i>Username Atau Password Salah
            </div>
          <?php endif ?>
          <form action="" method="POST">
            <div class="form-group position-relative has-icon-left mb-4 d-flex">
              <input type="text" name="username" class="form-control form-control-md" placeholder="Username" />
              <div class="form-control-icon mt-1">
                <i class="bi bi-person"></i>
              </div>
            </div>
            <div class="form-group position-relative has-icon-left mb-4 d-flex">
              <input type="text" name="fullname" class="form-control form-control-md" placeholder="Fullname" />
              <div class="form-control-icon mt-1">
                <i class="bi bi-person"></i>
              </div>
            </div>
            <div class="form-group position-relative has-icon-left mb-4 d-flex">
              <input type="text" name="phoneNumber" class="form-control form-control-md" placeholder="No HP" />
              <div class="form-control-icon mt-1">
                <i class="bi bi-phone"></i>
              </div>
            </div>
            <div class="form-group position-relative has-icon-left mb-4">
              <input id="password-input" type="password" name="password" class="form-control form-control-md" placeholder="Password" />
              <div class="form-control-icon mt-1">
                <i class="bi bi-shield-lock"></i>
              </div>
            </div>
            <div class="form-group position-relative has-icon-left mb-2">
              <input id="confirm-input" type="password" name="confirmPass" class="form-control form-control-md" placeholder="Confirm Password" />
              <div class="form-control-icon mt-1">
                <i class="bi bi-shield-lock"></i>
              </div>
            </div>
            <button id="register" type="submit" name="submit" class="btn btn-primary btn-block btn-md disabled shadow-lg mt-3">
              Register
            </button>
          </form>
          <div class="text-center mt-5">
            <p class="text-gray-600">
              Sudah Punya Akun?
              <a href="auth-register.html" class="font-bold">Log in</a>.
            </p>
          </div>
        </div>
      </div>
      <div class="col-lg-7 d-none d-lg-block">
        <div id="auth-right"
          style="background-image:url('../assets/images/eperpus/ilustrasi.jpg');object-fit:cover;width:100%;height:100%">
        </div>
      </div>
    </div>
  </div>
  <script src="../assets/extensions/jquery/jquery.min.js"></script>
  <script src="../assets/js/eperpus/confirmpass.js"></script>
</body>

</html>