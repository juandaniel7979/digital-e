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
     a {
        text-decoration: none;
    }

    /* Card Styles */

    .card-sl {
        border-radius: 8px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    .card-image img {
        max-height: 100%;
        max-width: 100%;
        border-radius: 8px 8px 0px 0;
    }

    .card-action {
        position: relative;
        float: right;
        margin-top: -25px;
        margin-right: 20px;
        z-index: 2;
        color: #E26D5C;
        background: #fff;
        border-radius: 100%;
        padding: 15px;
        font-size: 15px;
        box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.2), 0 1px 2px 0 rgba(0, 0, 0, 0.19);
    }

    .card-action:hover {
        color: #fff;
        background: #E26D5C;
        -webkit-animation: pulse 1.5s infinite;
    }

    .card-heading {
        font-size: 18px;
        font-weight: bold;
        background: #fff;
        padding: 10px 15px;
    }

    .card-text {
        padding: 10px 15px;
        background: #fff;
        font-size: 14px;
        color: #636262;
    }

    .card-button {
        display: flex;
        justify-content: center;
        padding: 10px 0;
        width: 100%;
        background-color: #1F487E;
        color: #fff;
        border-radius: 0 0 8px 8px;
    }

    .card-button:hover {
        text-decoration: none;
        background-color: #1D3461;
        color: #fff;

    }


    @-webkit-keyframes pulse {
        0% {
            -moz-transform: scale(0.9);
            -ms-transform: scale(0.9);
            -webkit-transform: scale(0.9);
            transform: scale(0.9);
        }

        70% {
            -moz-transform: scale(1);
            -ms-transform: scale(1);
            -webkit-transform: scale(1);
            transform: scale(1);
            box-shadow: 0 0 0 50px rgba(90, 153, 212, 0);
        }

        100% {
            -moz-transform: scale(0.9);
            -ms-transform: scale(0.9);
            -webkit-transform: scale(0.9);
            transform: scale(0.9);
            box-shadow: 0 0 0 0 rgba(90, 153, 212, 0);
        }
    }

    /*Profile Card 3*/
.profile-card-3 {
  font-family: 'Open Sans', Arial, sans-serif;
  position: relative;
  float: left;
  overflow: hidden;
  width: 100%;
  text-align: center;
  height:368px;
  border:none;

}
.profile-card-3 .background-block {
    float: left;
    width: 100%;
    height: 200px;
    overflow: hidden;
}
.profile-card-3 .background-block .background {
  width:100%;
  vertical-align: top;
  opacity: 0.9;
  -webkit-filter: blur(0.5px);
  filter: blur(0.5px);
   -webkit-transform: scale(1.8);
  transform: scale(2.8);
}
.profile-card-3 .card-content {
  width: 100%;
  padding: 15px 25px;
  color:#232323;
  float:left;
  background:#efefef;
  height:50%;
  border-radius:0 0 5px 5px;
  position: relative;
  z-index: 9999;
}
.profile-card-3 .card-content::before {
    content: '';
    background: #efefef;
    width: 120%;
    height: 100%;
    left: 11px;
    bottom: 51px;
    position: absolute;
    z-index: -1;
    transform: rotate(-13deg);
}
.profile-card-3 .profile {
  border-radius: 50%;
  position: absolute;
  bottom: 50%;
  left: 50%;
  max-width: 100px;
  opacity: 1;
  box-shadow: 3px 3px 20px rgba(0, 0, 0, 0.5);
  border: 2px solid rgba(255, 255, 255, 1);
  -webkit-transform: translate(-50%, 0%);
  transform: translate(-50%, 0%);
  z-index:99999;
}
.profile-card-3 h2 {
  margin: 0 0 5px;
  font-weight: 600;
  font-size:25px;
}
.profile-card-3 h2 small {
  display: block;
  font-size: 15px;
  margin-top:10px;
}
.profile-card-3 i {
  display: inline-block;
    font-size: 16px;
    color: #232323;
    text-align: center;
    border: 1px solid #232323;
    width: 30px;
    height: 30px;
    line-height: 30px;
    border-radius: 50%;
    margin:0 5px;
}
.profile-card-3 .icon-block{
    float:left;
    width:100%;
    margin-top:15px;
}
.profile-card-3 .icon-block a{
    text-decoration:none;
}
.profile-card-3 i:hover {
  background-color:#232323;
  color:#fff;
  text-decoration:none;
}
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
                        <img src="https://media.istockphoto.com/vectors/abstract-financial-chart-with-uptrend-line-graph-in-stock-market-on-vector-id1170949872?k=20&m=1170949872&s=612x612&w=0&h=X9p_eZqfK3sCkAmFk_Oo5tcFLG3dYAoZPXeagejsCwc=" alt="profile-sample1" class="background"/>
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

            <div class="col-md-4">
                <div class="card profile-card-3">
                    <div class="background-block">
                        <img src="https://media.istockphoto.com/vectors/abstract-financial-chart-with-uptrend-line-graph-in-stock-market-on-vector-id1170949872?k=20&m=1170949872&s=612x612&w=0&h=X9p_eZqfK3sCkAmFk_Oo5tcFLG3dYAoZPXeagejsCwc=" alt="profile-sample1" class="background"/>
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

            <div class="col-md-4">
                <div class="card profile-card-3">
                    <div class="background-block">
                        <img src="https://media.istockphoto.com/vectors/abstract-financial-chart-with-uptrend-line-graph-in-stock-market-on-vector-id1170949872?k=20&m=1170949872&s=612x612&w=0&h=X9p_eZqfK3sCkAmFk_Oo5tcFLG3dYAoZPXeagejsCwc=" alt="profile-sample1" class="background"/>
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
