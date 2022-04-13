<?php 
// se inicia la sesion
include_once 'init.php';
session_start();
// se elimina la informacion de la sesion
$_SESSION['username'] = "";
$_SESSION['token'] = "";
$_SESSION["correo"] = "";
$_SESSION["id"]= "";
$_SESSION["tipo"] = "";
$_SESSION["pref"] = "";
// se destruye la session
session_destroy();
// se redirecciona a index.php
header('Location: ../index.php');
// se pausa la ejecucion de script
exit;
 ?>