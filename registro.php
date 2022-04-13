<?php 
include_once 'conexion.php';
session_start();


$errormsg = "";
if (isset($_POST['login'])) {  

  $stmt = $con->prepare('INSERT INTO `usuarios`(`id`, `nombre`, `correo`, `password`, `img`, `descripcion`, `banner`, `subs`, `nivel`, `Rango`) VALUES (NULL,:nombre,:correo,md5(:pass),"https://img.icons8.com/color-glass/48/000000/guest-male.png","","https://wallpaperaccess.com/full/1267580.jpg","0000/00/00",0,0)');
  $stmt->execute(['nombre' => $_POST['nombre'],'correo' => $_POST['correo'],'pass' => $_POST['pass']]); 
  header('Location: index.php');
  exit;

}


 ?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Digital Entrepreneurs Registro</title>
  <link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="login">
  <center><img src="logo/azulconnombre.png" width="40%"></center>
  <div class="login-triangle"></div>
  
  <h2 class="login-header">Registrarse</h2>

  <form class="login-container" method="POST" action="index.php">
    <center><?php echo $errormsg ?></center>
    <p><input type="text" name="nombre" placeholder="Nombre"></p>
    <p><input type="email" name="correo" placeholder="Email"></p>
    <p><input type="text" name="pass" placeholder="Password"></p>
    <p><input type="submit" name="login" value="Registrarse"></p>
    <center><a href="sign-up.php" style="color: #000; text-decoration: none;">ya tengo una cuenta</a></center>
  </form>

</div>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
</body>
</html>
