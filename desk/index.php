<?php
    include_once './scripts/init.php';
    // session_start();
    // if (!isset($_SESSION['token'])) {
    //     if(isset($_COOKIE['token'])) {
    //         $_SESSION['token'] = $_COOKIE['token'];
    //     } else {
    //         header('Location: '.$app_dashboard.'index.php');
    //         exit;
    //     }
    // }

  $err_login = '';
  $cedulaTemp= '';

    // if (isset($_POST['login'])) {
    //     $url = $api_url."auth/login";
    //     $data = array("cedula" => $_POST['cedula'], "password" => $_POST['pass']);
    //     $result = toServer($url,"POST",$data);
    //     if ($result['error']==0) {
    //         setcookie("token", $result['token'], time() + (86400 * 30), "/"); // 86400 = 1 day
    //         $_SESSION['token'] = $result['token'];
    //     header('Location: '.$app_dashboard.'dashboard.php');
    //     exit;
    //     }else{
    //         echo "<script>alert('Cedula o contraseña incorrecta')</script>";
    //         $err_login = "Cedula o contraseña incorrecta";
    //         $cedulaTemp = $_POST['cedula'];
    //     }
        
    // }
  

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/index.css">
    <title>Talent Cloud</title>
</head>
<body>
    


    <div class="box container">
        <div class="row">
            <div class="col-5">
                <!-- aside banner -->
                <div class="aside-banner">
                    <img src="assets/img/banner.png" alt="">
                </div>
            </div>
            <div class="col-6">
                <!-- aside banner -->
                <div class="aside-login">

                    <center>
                    <h3>Talent Cloud</h3>
                    <h6>By Provenzal</h6>

                    <form action="index.php" method="POST">
                        
                            <p id="mensaje" style="color:red"><?php echo $err_login ?></p>
                        
                        <div class="form-group">
                            <label for="cedula" class="form-label mt-4">Cedula</label>
                            <input onchange="cleanInputs()" type="number" minlength="100000" class="form-control" name="cedula" id="cedula" placeholder="Documento de Identidad" value="<?php echo $cedulaTemp ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="pass" class="form-label mt-4">Contraseña</label>
                            <input onchange="cleanInputs()" type="password" class="form-control" name="pass" id="pass" placeholder="Contraseña" required>
                          </div>
                    
                    <br><br><br>
                    <button type="submit" class="btn btn-primary loginbtn" style="padding-left: 50px;
                    padding-right: 50px;
                    border-radius: 25px;" name="login" value="on">Iniciar Sesión</button>
                    </form>
                    </center>
                    
                </div>
            </div>
        </div>
    </div>


<script type="text/javascript">
    function cleanInputs() {
        document.getElementById('mensaje').innerText = "";
    }
</script>
</body>
</html>