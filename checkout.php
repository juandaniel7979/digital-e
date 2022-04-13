<?php 

include_once './scripts/init.php';
session_start();
if (!isset($_SESSION['token'])) {
  header('Location: index.php');
  exit;
}

$url = $api_url."api/profile/user";
$result = toServer($url,"GET",'',$_SESSION['token']);


$url = $api_url."api/pay/calDias";
$days = toServer($url,"GET",'',$_SESSION['token']);

if ($days['activa']==1) {
  header('Location: '.$app_dashboard.'index.php');
  exit;
}

if (isset($_GET['pay'])) {
  $url = $api_url."api/pay/sub";
  $pay = toServer($url,"GET",'',$_SESSION['token']);
}

 ?>

<!DOCTYPE html>
<html>
  <head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="assets/pay/css/materialize.min.css"  media="screen,projection"/>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="assets/pay/css/payments.css">
  </head>
  <body>


    <div class="contenedor z-depth-3">
<img src="assets/pay/img/blue.png" width="150px" alt="">


<div class="container cont">




<?php if (!isset($_GET['pay'])): ?>
  
<h6><?php echo $result['data']['nombre'] ?></h6>

<?php if ($days['dias']>44000): ?>
  <h5>¡Bienvenido, ya casi podras disfrutar de Digital Entrepreneiurs!</h5>
<?php endif ?>

<?php if ($days['dias']>31 && $days['dias']<44000): ?>
  <h5>¡Tu subscripcion a expirado!</h5>
<?php endif ?>


<p>No te pierdas de todos los cursos y directos de Digital Entrepreneurs de la mano de los mejores 
    educadores de esta area
</p>


<a class="waves-effect waves-light btn-large but" href="checkout.php?pay=1">Realizar pago con BTC</a> <br>
<br>
<a href="#"  class="logout"><b>cerrar sesión</b></a>
<?php endif ?>

<?php if (isset($_GET['pay'])): ?>
  
<img src="<?php echo $pay['data']['qrcode_url'] ?>"  width="250px" height="250px"><br>

<p>El valor en dolares de la subscripcion es: <b>$1 USD</b></p>
<p>tienes que depositar : <b><?php echo $pay['data']['amount'] ?> BTC</b></p>
<p>a la wallet: <b><?php echo $pay['data']['address'] ?></b></p>

<hr>

<p>TXN: <?php echo $pay['data']['txn_id'] ?></p>

<p>Estado de la transaccion:</p>
<a href="<?php echo $pay['data']['status_url'] ?>"  class="waves-effect waves-light btn-large but" href="checkout.php?pay=1">Revisar estado de la transacción</a> <br>
<br>
<?php endif ?>


<br><br>
<!-- cerrar sesión enlace a -->
<br><br>

</div>

    </div>



    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="assets/pay/js/materialize.min.js"></script>
  </body>
</html>