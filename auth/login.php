<?php



include('../core/controllers/member.php');

$members = new Member;


$members->Middleware(1,'Location:/');


if(isset($_POST['submit'])){
   
   $members->Login();

}




?>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - E-Library</title>

    <link
      rel="shortcut icon"
      href="../assets/images/eperpus/logo-eperpus-mini.png"
      type="image/x-icon"/>
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
              <a href="index.html"
                ><img src="../assets/images/eperpus/logo-eperpus.webp" alt="Logo"
              /></a>
            </div>
            <h3>Log in.</h3>
            <p class="mb-5" style="font-size:20px;">
              Log in Sebagai Member
            </p>
            <form action="" method="POST">
              <div class="form-group position-relative has-icon-left mb-4 d-flex">
                <input
                  type="text"
                  name="username"
                  class="form-control form-control-md"
                  placeholder="Username"
                />
                <div class="form-control-icon mt-1">
                  <i class="bi bi-person"></i>
                </div>
              </div>
              <div class="form-group position-relative has-icon-left mb-4">
                <input
                  type="password"
                  name="password"
                  class="form-control form-control-md"
                  placeholder="Password"
                />
                <div class="form-control-icon mt-1">
                  <i class="bi bi-shield-lock"></i>
                </div>
              </div>
              <div class="form-check form-check-lg d-flex align-items-end">
                <input
                  class="form-check-input me-2"
                  type="checkbox"
                  value=""
                  id="flexCheckDefault"
                />
                <label
                  class="form-check-label text-gray-600"
                  for="flexCheckDefault"
                >
                  Izinkan Saya Tetap Masuk
                </label>
              </div>
              <button type="submit" name="submit" class="btn btn-primary btn-block btn-md shadow-lg mt-5">
                Log in
              </button>
            </form>
            <div class="text-center mt-5">
              <p class="text-gray-600">
                Tidak Punya Akun?
                <a href="auth-register.html" class="font-bold">Sign up</a>.
              </p>
              <p>
                <a class="font-bold" href="auth-forgot-password.html"
                  >Lupa password?</a
                >.
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-7 d-none d-lg-block">
          <div id="auth-right" style="background-image:url('../assets/images/eperpus/ilustrasi.jpg');object-fit:cover;width:100%;height:100%">
            
          </div>
        </div>
      </div>
    </div>
  </body>
</html>