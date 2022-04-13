<?php 
include_once './scripts/init.php';
session_start();
if (!isset($_SESSION['token'])) {
    if(isset($_COOKIE['token'])) {
            $_SESSION['token'] = $_COOKIE['token'];
    } else {
        header('Location: '.$app_dashboard.'index.php');
        exit;
    }
}

$url = $api_url."tc/usuarios/admins";
//$data = array("cedula" => $_POST['cedula'], "password" => $_POST['pass']);
$result = toServer($url,"GET",'',$_SESSION['token']); 


if (isset($_GET['del'])) {
$url = $api_url."tc/usuarios/admins";
$data = array("id" => $_GET['del']);
$result = toServer($url,"DELETE",$data,$_SESSION['token']); 
header('Location: '.$app_dashboard.'admin.php');
exit;
}

if (isset($_POST['add'])) {

 $url = $api_url."tc/usuarios/admins";
$data = array("nombre" => $_POST['nombre'],"cargo" => $_POST['cargo'],"wirepusher" => $_POST['wire'],"cedula" => $_POST['cedula'], "password" => $_POST['pass']);

$resulta = toServer($url,"POST",$data,$_SESSION['token']); 

$wire = 'https://wirepusher.com/send?id='.$_POST['wire'].'&title=Talent%20Cloud&message=bienvenido%20'.$_POST['nombre'].'%20ya%20tienes%20acceso%20a%20la%20plataforma%20Talent%20Cloud,%20tu%20usuario%20es:%20'.$_POST['cedula'].'%20y%20tu%20contraseña:%20'.$_POST['pass'].'&image_url=https://www.provenzal.net/wp-content/uploads/2020/03/logo-m2.png';
toServer($wire,"GET","");

header('Location: '.$app_dashboard.'admin.php');
exit;


}

if (isset($_POST['edit'])) {
$url = $api_url."tc/usuarios/admins";
echo $_POST['cargo'];
echo $_POST['pass'];
echo $_POST['nombre'];
echo $_POST['cedula'];
echo $_POST['wirepusher'];
if($_POST['pass']!=""){
$data = array("id" => $_POST['id'],"nombre" => $_POST['nombre'],"cargo" => $_POST['cargo'],"wirepusher" => $_POST['wire'],"cedula" => $_POST['cedula'], "password" => $_POST['pass']);
}else{
$data = array("id" => $_POST['id'],"nombre" => $_POST['nombre'],"cargo" => $_POST['cargo'],"wirepusher" => $_POST['wire'],"cedula" => $_POST['cedula']);
}

$resultas = toServer($url,"PUT",$data,$_SESSION['token']); 
header('Location: '.$app_dashboard.'admin.php');
exit;

}

 ?>

<!DOCTYPE html>
  <!-- Coding by CodingLab | www.codinglabweb.com -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" href="./css/dashboard.css">
    
    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    
    <!--<title>Dashboard Sidebar Menu</title>--> 
</head>
<body>
    <?php $active = 2 ?>
    <?php include_once './componentes/nav.php'; ?>


<section class="home container">
    <div class="text">Administradores</div>


    <h4 style="text-align:center;">Administradores</h4>


<div class="table-responsive">
<table class="table centerTable table-hover">
  <thead class="thead-dark text-center">
    <tr>
      <th scope="col">Nombre</th>
      <th scope="col">Area</th>
      <th scope="col">Cedula</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody class="text-center">
<br>
<center><button type="button" data-toggle="modal" data-target="#add" class="btn btn-success"><i class='bx bx-user-plus icon' style="font-size: 15px"></i> Añadir nuevo administrador</button></center><br>

    <?php foreach ($result['users'] as $user): ?>
        <tr>
      <th scope="row"><?php echo $user['nombre'] ?></th>
      <td><?php echo $user['cargo'] ?></td>
      <td><?php echo $user['cedula'] ?></td>
      <td>
      &nbsp;
      <a  data-toggle="modal" data-target="#del-<?php echo $user['_id'] ?>"><i class='bx bx-user-minus icon text-danger' style="font-size: 30px;"></i></a>
      &nbsp;
      <a  data-toggle="modal" data-target="#edit-<?php echo $user['_id'] ?>"><i class='bx bx-edit-alt icon text-warning' style="font-size: 30px;"></i></a>
      </td>
    </tr>
    <?php endforeach ?>

   
  </tbody>
</table>
</div>
    </section>




<?php foreach ($result['users'] as $user): ?>
 <div class="modal" id="edit-<?php echo $user['_id'] ?>">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title"><?php echo $user['nombre'] ?></h4>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
    <form action="admin.php" method="POST">
        <div class="form-group">
        <label for="exampleInputEmail1">Nombre</label>
        <input type="text" value="<?php echo $user['nombre']?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nombre" placeholder="Ingresa el nombre del administrador" required><br>
        </div>
        <div class="form-group">
        <label for="exampleInputEmail1">Cargo</label>
        <input type="text" value="<?php echo $user['cargo']?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="cargo" placeholder="Ingresa el nombre del administrador" required><br>
        </div>
        <div class="form-group">
        <label for="exampleInputEmail1">Cedula</label>
        <input type="number"  value="<?php echo $user['cedula']?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="cedula" placeholder="Ingresa la cedula del administrador" required><br>
        </div>

        <div class="form-group">
        <label for="exampleInputPassword1">Contraseña</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Ingresa la contraseña del administrador" name="pass"><br>
        </div>

        <div class="form-group">
        <label for="exampleInputEmail1">Codigo WirePusher</label>
        <input type="text" name="wire"  value="<?php echo $user['wirepusher']?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingresa codigo wirepusher del administrador">
        <small id="emailHelp"  class="form-text text-muted">Opcional</small>
        </div><br>
        <input type="hidden" name="id" value="<?php echo $user['_id']?>">
 <br>
  <center><button type="submit" name="edit" value="on" class="btn btn-success">Editar Administrador</button></center>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>

    </div>
  </div>
</div>  


 <div class="modal" id="del-<?php echo $user['_id'] ?>">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title">Borrando a <?php echo $user['nombre'] ?></h4>
      </div>
      <!-- Modal body -->
      <div class="modal-body"><br><br>
    <p style="text-align:center;">¿esta seguro que desea eliminar a <?php echo $user['nombre'] ?>?</p><br>
    <center><a class="btn btn-warning" href="admin.php?del=<?php echo $user['_id'] ?>" role="button">Eliminar Administrador</a></center>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>

    </div>
  </div>
</div>   
<?php endforeach ?>





<div class="modal" id="add">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Añadir nuevo Administrador</h4>
        
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        
    <form action="admin.php" method="POST">
        <div class="form-group">
        <label for="exampleInputEmail1">Nombre</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nombre" placeholder="Ingresa el nombre del administrador" required><br>
        </div>
        <div class="form-group">
        <label for="exampleInputEmail1">Cargo</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="cargo" placeholder="Ingresa el nombre del administrador" required><br>
        </div>
        <div class="form-group">
        <label for="exampleInputEmail1">Cedula</label>
        <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="cedula" placeholder="Ingresa la cedula del administrador" required><br>
        </div>

        <div class="form-group">
        <label for="exampleInputPassword1">Contraseña</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Ingresa la contraseña del administrador" name="pass"><br>
        <small id="emailHelp"  class="form-text text-muted">Dejar vacio si no se desea modificar</small>
        </div>

        <div class="form-group">
        <label for="exampleInputEmail1">Codigo WirePusher</label>
        <input type="text" name="wire" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingresa codigo wirepusher del administrador">
        <small id="emailHelp"  class="form-text text-muted">Opcional</small>
        </div><br>

         
 <br>
  <center><button type="submit" name="add" value="on" class="btn btn-success">Crear Administrador</button></center>
</form>


      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>

    </div>
  </div>
</div>





    <script>
        const body = document.querySelector('body'),
      sidebar = body.querySelector('nav'),
      toggle = body.querySelector(".toggle"),
      searchBtn = body.querySelector(".search-box"),
      modeSwitch = body.querySelector(".toggle-switch"),
      modeText = body.querySelector(".mode-text");
      //logo = document.getElementById('imglogo');
      //body.classList.toggle("dark");
      //logo.src = "img/logo.png";

toggle.addEventListener("click" , () =>{
    sidebar.classList.toggle("close");
})

searchBtn.addEventListener("click" , () =>{
    sidebar.classList.remove("close");
})

modeSwitch.addEventListener("click" , () =>{
    body.classList.toggle("dark");
    
    if(body.classList.contains("dark")){
        modeText.innerText = "Light mode";
    }else{
        modeText.innerText = "Dark mode";
        
    }
});
    </script>

 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
</body>
</html>
