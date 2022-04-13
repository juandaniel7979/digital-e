<!DOCTYPE html>
  <!-- Coding by CodingLab | www.codinglabweb.com -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" type="text/css" href="./dashboard/css/bootstrap.css">
    <link rel="stylesheet" href="./dashboard/css/dashboard.css">
    
    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="dashboard/css/inicio.css">
    <!--<title>Dashboard Sidebar Menu</title>--> 
</head>
<body>
    <?php $active = 1 ?>
    <?php include_once './componentes/nav.php'; ?>


    <section class="home">
        <div class="text">inicio</div>

            <br><br>

            <center><h3 class="text">Cursos recientes</h3></center>

<style type="text/css">
     
</style>     


  <div class="container" >
        <div class="row">
            <div class="col-md-3">
                <div class="card-sl">
                    <div class="card-image">
                        <img
                            src="https://img.freepik.com/free-vector/forex-trading-background_23-2148592453.jpg" />
                    </div>

                    <div class="card-heading">
                        Curso de introduccion al Trading
                    </div>
                    <div class="card-text">
                        este curso consta de 8 clases en las cuales son esplicadas por nuestros mejores instructores en la cual te daran la entrada a entender el trading.
                    </div>
                    <div class="card-text">
                       
                    </div>
                    <a href="#" class="card-button"> Ver curso</a>
                </div>
            </div>
        </div>  



<br><br>

            <center><h3 class="text">Nuestro Profesores</h3></center><br><br>

<div class="row">
            <div class="col-md-4">
                <div class="card profile-card-3">
                    <div class="background-block">
                        <img src="https://wallpaperaccess.com/full/1267572.jpg" alt="profile-sample1" class="background"/>
                    </div>
                    <div class="profile-thumb-block">
                        <img src="dashboard/img/stiven.png" height="100" alt="profile-image" class="profile"/>
                    </div>
                    <div class="card-content">
                    <h2>Stiven Agudelo<small>Trader & Emprendedor Digital</small></h3>
                    <div class="icon-block"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"> <i class="fa fa-twitter"></i></a><a href="#"> <i class="fa fa-google-plus"></i></a></div>
                    </div>
                </div>
                
            </div>

            <div class="col-md-4">
                <div class="card profile-card-3">
                    <div class="background-block">
                        <img src="https://i.ytimg.com/vi/uj8NHK0pFMs/maxresdefault.jpg" alt="profile-sample1" class="background"/>
                    </div>
                    <div class="profile-thumb-block">
                        <img src="dashboard/img/haly.png" height="100" alt="profile-image" class="profile"/>
                    </div>
                    <div class="card-content">
                    <h2>Haly Rodríguez<small>Trader & Emprendedor Digital</small></h3>
                    <div class="icon-block"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"> <i class="fa fa-twitter"></i></a><a href="#"> <i class="fa fa-google-plus"></i></a></div>
                    </div>
                </div>
                
            </div>

            <div class="col-md-4">
                <div class="card profile-card-3">
                    <div class="background-block">
                        <img src="https://wallpaperaccess.com/full/1267563.jpg" alt="profile-sample1" class="background"/>
                    </div>
                    <div class="profile-thumb-block">
                        <img src="dashboard/img/fer.png" height="100" alt="profile-image" class="profile"/>
                    </div>
                    <div class="card-content">
                    <h2>Fernando Gomez<small>Trader & Emprendedor Digital</small></h3>
                    <div class="icon-block"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"> <i class="fa fa-twitter"></i></a><a href="#"> <i class="fa fa-google-plus"></i></a></div>
                    </div>
                </div>
                
            </div>
</div>
<br><br><br>
    </section>

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
