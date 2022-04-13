
<?php 
include_once 'scripts/init.php';
$itsok = false;
$loginmessage = "";

session_start();
if (isset($_SESSION['token'])) {
  header('Location: dashboard.php');
  exit;
}


if(isset($_POST["signup"])){
  $name = $_POST["name"];
  $email = $_POST["email"];
  $pass = $_POST["password"];
  $url = $api_url."api/user/register";
  $data = array("nombre" => $name,"correo" => $email, "password" => $pass);
  $result = toServer($url,"POST",$data);
  if($result["error"]==1){
    $itsok = true;
    $loginmessage = $result["message"];
    // print_r($result["message"]);
  }else{
    // no ocurrio ningun error
    $user = $result["data"]["user"];
    $_SESSION["token"] = $result["token"];
    // print_r($result3);
    // echo "<script>alert('Bienvenido ".$_SESSION["nombre"]."')</script>";
    header('Location: login.php');
    exit;
  }
}
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <title>
    Registrarse
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="assets/css/material-dashboard.css?v=3.0.1" rel="stylesheet" />
</head>

<body class="">
  <div class="container position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">
      </div>
    </div>
  </div>
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
              <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center" style="background-image: url('https://cdn.create.vista.com/api/media/small/394353262/stock-photo-close-shot-digital-screen-candlestick'); background-size: cover;">
              </div>
            </div>
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
              <div class="card card-plain">
                <div class="card-header">
                  <h4 class="font-weight-bolder">Registrate</h4>
                  <p class="mb-0">Ingresa tu email y contraseña para registrarte</p>
                </div>
                <div class="card-body">
                  <form action="sign-up.php" method="POST">
                    <div class="input-group input-group-outline mb-3">
                      <!-- <label class="form-label">Name</label> -->
                      <input type="text" name="name" placeholder="Nombre" class="form-control" >
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <!-- <label class="form-label">Email</label> -->
                      <input type="email" name="email" placeholder="Correo" class="form-control" >
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <!-- <label class="form-label">Password</label> -->
                      <input type="password" name="password" placeholder="Contrasena" class="form-control" >
                    </div>
                    <!-- <div class="form-check form-check-info text-start ps-0">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                      <label class="form-check-label" for="flexCheckDefault">
                        I agree the <a href="javascript:;" class="text-dark font-weight-bolder">Terms and Conditions</a>
                      </label>
                    </div> -->
                    <?php if ($loginmessage!=""): ?>
                      <div id="merror" style="color: red; text-align: center;"><?php echo $loginmessage ?></div>
                    <?php endif ?>
                    <div class="text-center">
                      <button name="signup" type="submit" class="btn bg-gradient-info w-100 my-4 mb-2">Registrarse</button>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-2 text-sm mx-auto">
                    Ya tienes cuenta?
                    <a href="login.php" class="text-info text-gradient font-weight-bold">Login</a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <!--   Core JS Files   -->
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/material-dashboard.min.js?v=3.0.1"></script>
</body>

</html>