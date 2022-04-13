<?php 
include_once 'scripts/init.php';
$itsok = false;
$errormsg = "";
session_start();


if (isset($_SESSION['token'])) {
  $url = $api_url."api/pay/calDias";
  $days = toServer($url,"GET",'',$_SESSION['token']);
  if($days['activa']==1){
    header('Location: '.$app_dashboard.'dashboard.php');
    exit;
  }else{
    header('Location: checkout.php');
    exit;
  }
}


if(isset($_POST["send"])){
  $email = $_POST["email"];
  $pass = $_POST["password"];
  $url = $api_url."api/user/login";
  $data = array("correo" => $email, "password" => $pass);
  $result = toServer($url,"POST",$data);
  if($result["error"]==1){
    $itsok = true;
    $errormsg = '<p style="color: red">'.$result["message"].'</p>';

  }else{
    // no ocurrio ningun error
    $user = $result["data"]["user"];
    $_SESSION["id"] = $user['_id'];
    $_SESSION["nombre"] = $user['name'];  
    $_SESSION["token"] = $result["data"]["token"];
    $_SESSION["correo"] = $user['email'];
    //echo "<script>alert('Bienvenido de vuelta ".$_SESSION["nombre"]."')</script>";
    header('Location: login.php');
    exit;
  }
}

 ?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Digital Entrepreneurs login</title>
  <link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="login">
  <br><br>
  <center><img src="logo/azulconnombre.png" width="40%"></center>
  <div class="login-triangle"></div>
  
  <h2 class="login-header">Inicio de sesión</h2>

  <form class="login-container" method="POST" action="login.php">
    <center><?php echo $errormsg ?></center>
    <p><input type="email" name="email" placeholder="Correo Electronico"></p>
    <p><input type="password" name="password" placeholder="Contraseña"></p>
    <p><input type="submit" name="send" value="Iniciar Sesión"></p>
    <br>
    <center><a href="sign-up.php" style="color: #000; text-decoration: none;">Crear una nueva cuenta</a></center>
    <br>
  </form>

</div>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
</body>
</html>
