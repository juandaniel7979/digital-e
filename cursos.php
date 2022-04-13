<?php
    header('Access-Control-Allow-Origin: *');
    include_once './scripts/init.php';
    session_start();
    if (!isset($_SESSION['token'])) {
      header('Location: '.$app_dashboard.'index.php');
      exit;
    }

    // if (!(isset($_GET['id']))) {
    //     header('Location: '.$app_dashboard.'dashboard.php');
    //     exit;
    //   }else{
    //       $_id = $_GET['id'];
    //   }


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
    $cursos = toServer($url,"GET","",$_SESSION['token']);
    
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
    <?php $active = 2 ?>
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

           

        <style type="text/css">
                    

@import url("https://fonts.googleapis.com/css2?family=Baloo+2&display=swap");
/* This pen */

.dark_curso {
  background: #110f16;
}

.light_curso {
  background: #f3f5f7;
}

a, a:hover {
  text-decoration: none;
  transition: color 0.3s ease-in-out;
}

#pageHeaderTitle {
  margin: 2rem 0;
  text-transform: uppercase;
  text-align: center;
  font-size: 2.5rem;
}

/* Cards */
.postcard_curso {
  flex-wrap: wrap;
  display: flex;
  box-shadow: 0 4px 21px -12px rgba(0, 0, 0, 0.66);
  border-radius: 10px;
  margin: 0 0 2rem 0;
  overflow: hidden;
  position: relative;
  color: #ffffff;
}
.postcard_curso.dark {
  background-color: #18151f;
}
.postcard_curso.light {
  background-color: #e1e5ea;
}
.postcard_curso .t-dark {
  color: #18151f;
}
.postcard_curso a {
  color: inherit;
}
.postcard_curso h1, .postcard_curso .h1 {
  margin-bottom: 0.5rem;
  font-weight: 500;
  line-height: 1.2;
}
.postcard_curso .small {
  font-size: 80%;
}
.postcard_curso .postcard_curso__title {
  font-size: 1.75rem;
}
.postcard_curso .postcard_curso__img {
  max-height: 180px;
  width: 100%;
  object-fit: cover;
  position: relative;
}
.postcard_curso .postcard_curso__img_link {
  display: contents;
}
.postcard_curso .postcard_curso__bar {
  width: 50px;
  height: 10px;
  margin: 10px 0;
  border-radius: 5px;
  background-color: #424242;
  transition: width 0.2s ease;
}
.postcard_curso .postcard_curso__text {
  padding: 1.5rem;
  position: relative;
  display: flex;
  flex-direction: column;
}
.postcard_curso .postcard_curso__preview-txt {
  overflow: hidden;
  text-overflow: ellipsis;
  text-align: justify;
  height: 100%;
}
.postcard_curso .postcard_curso__tagbox {
  display: flex;
  flex-flow: row wrap;
  font-size: 14px;
  margin: 20px 0 0 0;
  padding: 0;
  justify-content: center;
}
.postcard_curso .postcard_curso__tagbox .tag__item {
  display: inline-block;
  background: rgba(83, 83, 83, 0.4);
  border-radius: 3px;
  padding: 2.5px 10px;
  margin: 0 5px 5px 0;
  cursor: default;
  user-select: none;
  transition: background-color 0.3s;
}
.postcard_curso .postcard_curso__tagbox .tag__item:hover {
  background: rgba(83, 83, 83, 0.8);
}
.postcard_curso:before {
  content: "";
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  background-image: linear-gradient(-70deg, #424242, transparent 50%);
  opacity: 1;
  border-radius: 10px;
}
.postcard_curso:hover .postcard_curso__bar {
  width: 100px;
}

@media screen and (min-width: 769px) {
  .postcard_curso {
    flex-wrap: inherit;
  }
  .postcard_curso .postcard_curso__title {
    font-size: 2rem;
  }
  .postcard_curso .postcard_curso__tagbox {
    justify-content: start;
  }
  .postcard_curso .postcard_curso__img {
    max-width: 300px;
    max-height: 100%;
    transition: transform 0.3s ease;
  }
  .postcard_curso .postcard_curso__text {
    padding: 3rem;
    width: 100%;
  }
  .postcard_curso .media.postcard_curso__text:before {
    content: "";
    position: absolute;
    display: block;
    background: #18151f;
    top: -20%;
    height: 130%;
    width: 55px;
  }
  .postcard_curso:hover .postcard_curso__img {
    transform: scale(1.1);
  }
  .postcard_curso:nth-child(2n+1) {
    flex-direction: row;
  }
  .postcard_curso:nth-child(2n+0) {
    flex-direction: row-reverse;
  }
  .postcard_curso:nth-child(2n+1) .postcard_curso__text::before {
    left: -12px !important;
    transform: rotate(4deg);
  }
  .postcard_curso:nth-child(2n+0) .postcard_curso__text::before {
    right: -12px !important;
    transform: rotate(-4deg);
  }
}
@media screen and (min-width: 1024px) {
  .postcard_curso__text {
    padding: 2rem 3.5rem;
  }

  .postcard_curso__text:before {
    content: "";
    position: absolute;
    display: block;
    top: -20%;
    height: 130%;
    width: 55px;
  }

  .postcard_curso.dark .postcard_curso__text:before {
    background: #18151f;
  }

  .postcard_curso.light .postcard_curso__text:before {
    background: #e1e5ea;
  }
}
/* COLORS */
.postcard_curso .postcard_curso__tagbox .green.play:hover {
  background: #79dd09;
  color: black;
}

.green .postcard_curso__title:hover {
  color: #79dd09;
}

.green .postcard_curso__bar {
  background-color: #79dd09;
}

.green::before {
  background-image: linear-gradient(-30deg, rgba(121, 221, 9, 0.1), transparent 50%);
}

.green:nth-child(2n)::before {
  background-image: linear-gradient(30deg, rgba(121, 221, 9, 0.1), transparent 50%);
}

.postcard_curso .postcard_curso__tagbox .blue.play:hover {
  background: #0076bd;
}

.blue .postcard_curso__title:hover {
  color: #0076bd;
}

.blue .postcard_curso__bar {
  background-color: #0076bd;
}

.blue::before {
  background-image: linear-gradient(-30deg, rgba(0, 118, 189, 0.1), transparent 50%);
}

.blue:nth-child(2n)::before {
  background-image: linear-gradient(30deg, rgba(0, 118, 189, 0.1), transparent 50%);
}

.postcard_curso .postcard_curso__tagbox .red.play:hover {
  background: #bd150b;
}

.red .postcard_curso__title:hover {
  color: #bd150b;
}

.red .postcard_curso__bar {
  background-color: #bd150b;
}

.red::before {
  background-image: linear-gradient(-30deg, rgba(189, 21, 11, 0.1), transparent 50%);
}

.red:nth-child(2n)::before {
  background-image: linear-gradient(30deg, rgba(189, 21, 11, 0.1), transparent 50%);
}

.postcard_curso .postcard_curso__tagbox .yellow.play:hover {
  background: #bdbb49;
  color: black;
}

.yellow .postcard_curso__title:hover {
  color: #bdbb49;
}

.yellow .postcard_curso__bar {
  background-color: #bdbb49;
}

.yellow::before {
  background-image: linear-gradient(-30deg, rgba(189, 187, 73, 0.1), transparent 50%);
}

.yellow:nth-child(2n)::before {
  background-image: linear-gradient(30deg, rgba(189, 187, 73, 0.1), transparent 50%);
}

@media screen and (min-width: 769px) {
  .green::before {
    background-image: linear-gradient(-80deg, rgba(121, 221, 9, 0.1), transparent 50%);
  }

  .green:nth-child(2n)::before {
    background-image: linear-gradient(80deg, rgba(121, 221, 9, 0.1), transparent 50%);
  }

  .blue::before {
    background-image: linear-gradient(-80deg, rgba(0, 118, 189, 0.1), transparent 50%);
  }

  .blue:nth-child(2n)::before {
    background-image: linear-gradient(80deg, rgba(0, 118, 189, 0.1), transparent 50%);
  }

  .red::before {
    background-image: linear-gradient(-80deg, rgba(189, 21, 11, 0.1), transparent 50%);
  }

  .red:nth-child(2n)::before {
    background-image: linear-gradient(80deg, rgba(189, 21, 11, 0.1), transparent 50%);
  }

  .yellow::before {
    background-image: linear-gradient(-80deg, rgba(189, 187, 73, 0.1), transparent 50%);
  }

  .yellow:nth-child(2n)::before {
    background-image: linear-gradient(80deg, rgba(189, 187, 73, 0.1), transparent 50%);
  }
}


        </style>     




















<div class="dark">
    <div class="container py-4">
        <h1 class="h1 text-center" id="pageHeaderTitle">Cursos Digital Entrepreneurs</h1>



<?php foreach ($cursos['curso'] as $curso): ?>
<?php 
    $url = $api_url."api/canal/user";
    $data = array("id" => $curso['id_creador']);
    $educador = toServer($url,"POST",$data,$_SESSION['token']);

    $url = $api_url."api/canal/videos";
    $data = array("id_curso" => $curso['_id']);
    $videos = toServer($url,"GET",$data,$_SESSION['token']);


    
 ?>
        <article class="postcard_curso dark blue">
            <a class="postcard_curso__img_link" href="#">
                <img class="postcard_curso__img" src="<?php echo $curso['img'] ?>" alt="Image Title" />
            </a>
            <div class="postcard_curso__text">
                <h1 class="postcard_curso__title blue"><a href="curso.php?id=<?php echo $curso['id_creador'] ?>"><?php echo $curso['nombre'] ?></a></h1>
                <div class="postcard_curso__subtitle small">
                    <time datetime="2020-05-25 12:00:00">
                        <i class="fas fa-calendar-alt mr-2"></i>Curso por <?php echo $educador['data']['nombre'] ?>
                    </time>
                </div>
                <div class="postcard_curso__bar"></div>
                <div class="postcard_curso__preview-txt"><?php echo $curso['descripcion'] ?></div>

                <ul class="postcard_curso__tagbox">
                    <li class="tag__item"><i class="fas fa-tag mr-2"></i><?php echo $educador['data']['nombre'] ?></li>
                    <li class="tag__item"><i class="fas fa-clock mr-2"></i><?php echo count($videos['video']) ?> Videos</li>
                    <li class="tag__item play blue">
                        <a href="curso.php?id=<?php echo $curso['id_creador'] ?>"><i class="fas fa-play mr-2"></i>Ver Curso</a>
                    </li>
                </ul>
            </div>
        </article>

<?php endforeach ?>

    </div>
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
