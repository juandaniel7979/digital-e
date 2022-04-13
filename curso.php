<?php
    header('Access-Control-Allow-Origin: *');
    include_once './scripts/init.php';
    session_start();
    if (!isset($_SESSION['token'])) {
      header('Location: '.$app_dashboard.'index.php');
      exit;
    }

    if (!(isset($_GET['id']))) {
        header('Location: '.$app_dashboard.'dashboard.php');
        exit;
      }else{
          $_id = $_GET['id'];
      }


    $url = $api_url."api/profile/user";
    $result = toServer($url,"GET",'',$_SESSION['token']);
    // print_r($result);

    $url = $api_url."api/pay/calDias";
    $days = toServer($url,"GET",'',$_SESSION['token']);

    if ($days['activa']==0) {
      header('Location: '.$app_dashboard.'checkout.php');
      exit;
    }
    
    $url = $api_url."api/canal/cursos";
    $data = array("id" => $_GET['id']);
    $curso = toServer($url,"GET",$data,$_SESSION['token']);
    if($curso['error']==1){
      header('Location: '.$app_dashboard.'index.php');
      exit;
    }else{
      $curso = $curso['curso'][0];
    }


    $url = $api_url."api/canal/videos";
    $data = array("id_curso" => $_GET['id']);
    $videos = toServer($url,"GET",$data,$_SESSION['token']);

    
?>

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
    <script src="https://cdn.jsdelivr.net/npm/hls.js@latest"></script>
    
    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="dashboard/css/inicio.css">
    <!--<title>Dashboard Sidebar Menu</title>--> 
</head>
<body>
    <?php $active = 2?>
    <?php include_once './componentes/nav.php'; ?>

    <?php foreach ($videos['video'] as $key):?>
        <div class="modal fade" id="video-<?php echo $key['_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div style="width: 80% !important;" class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-weight: bold;color:black !important;"  class="modal-title text-dark" id="exampleModalLabel"><?php echo $key['titulo']; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-dark">
                <video style="width:100%; height: 100%;" controls>
                    <source src="<?php echo $key['video_url']; ?>" type="video/mp4">
                    Tu navegador no soporta los vídeos de HTML5
                </video>

                </div>
                <div style="justify-content: flex !important;" class="modal-footer">
                    <div class="row">
                    <div class="col-md-6">
                        <button type="button" class="btn btn-info" data-bs-dismiss="modal">Antes</button>
                    </div>
                    <div class="col-md-6">
                        <button type="button" name="next" type="submit" class="btn btn-info">Despues</button>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>

        <?php endforeach ?>


    <section class="home">
        <div class="text">inicio</div>

            <br><br>


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

        <?php foreach ($videos['video'] as $par):?>
            <div class="col-md-3">
                <div class="card-sl mb-5">
                    <div class="card-image">
                        <a data-bs-toggle="modal" data-bs-target="#video-<?php echo $par['_id']; ?>" >
                            <img src="<?php echo $par['img']?>" />
                        </a>
                    </div>
                    <div class="card-heading">
                    <?php echo $par['titulo']?>
                    </div>
                    <div class="card-text">
                        <?php echo $par['descripcion']?>
                    </div>
                    <div class="card-text">
                    </div>
                    <a class="btn card-button" href="video.php?id_curso=<?php echo $_GET['id']?>&id_video=<?php echo $par['_id']; ?>" > Ver video</a>
                </div>
            </div>
        <?php endforeach?>
        </div>  


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
