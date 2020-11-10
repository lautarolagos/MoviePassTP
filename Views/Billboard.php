<?php 
  include("Nav.php");
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Billboard · MoviePass</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/album/">

    <!-- Bootstrap core CSS -->
<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="<?php echo CSS_PATH ?>billboard.css" rel="stylesheet">
  </head>
  <body>
    <header>
<!-- NAV CON BOTON DE BUSQUEDA, DESHABILITADO TEMPORALMENTE HASTA QUE HAGAMOS EL BACKEND DEL BOTON-->
<!-- <div class="navbar navbar-dark bg-dark shadow-sm">
      <div class="container d-flex justify-content-between">
        <h1 style="margin:0; padding:0;">M<span>OVIE</span> P<span>ASS</span></h1>
        <form action="#" method="" class="form-inline mt-2 mt-md-0">
        <input class="form-control mr-sm-2" type="text" id="btn-search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" for="btn-search" type="button">Search</button>
      </form>
      </div>
    </div>
    </div>
  </nav> -->
<!-- NAV END -->
</header>
<!-- CAROUSEL -->
<main role="main">

  <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
      <img src="https://i.imgur.com/49gJeYi.jpg" alt="firstSlider">
        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img"><rect width="100%" height="100%" fill="#777"/></svg>
        <div class="container">
          <div class="carousel-caption text-left">
            <h1>DISCOUNTS EVERY WEEK</h1>
            <center><p>25% OFF every Tuesday and Wednesday when buying 2 or more tickets!</p></center>
          </div>
        </div>
      </div>
      <div class="carousel-item">
      <img src="https://i.imgur.com/YiGesA8.jpg" alt="secondSlider">
        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img"><rect width="100%" height="100%" fill="#777"/></svg>
        <div class="container">
          <div class="carousel-caption">
            <h1>CINEMAS WITH THE LASTEST TECHNOLOGY</h1>
            <center><p>Equiped with Dolby Surround 7.1 and screens up to 8K for the best immersive experience</p></center>
          </div>
        </div>
      </div>
      <div class="carousel-item">
      <img src="https://i.imgur.com/i4NQ2Yg.jpg" alt="thirdSlider">
        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img"><rect width="100%" height="100%" fill="#777"/></svg>
        <div class="container">
          <div class="carousel-caption text-right">
            <h1>PREMIERES AND UPCOMING MOVIES</h1>
            <center><p>Watch the latest movies and be the first to see them!</p></center>
          </div>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
    </main>

<!-- CAROUSEL END -->
 
<div class="album py-5 bg-light">
    <div class="container">


    <div class="row">
    <?php 
    for($i=0; $i<3; $i++)
    {?>  
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
            <div class="card-body">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <div class="d-flex justify-content-between align-items-center">
                <!-- BOTON COLAPSABLE -->
                <div class="btn-group">
                    <div class="container">
                    <button type="button" class="projections">Projections</button>
                        <button type="button" class="collapsible">Details</button>
                        <div class="content">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </div>
                    </div>
                </div>
                <!-- BOTON COLAPSABLE END -->
              </div>
            </div>
          </div>
        </div>
        <?php }?>
      </div>
    </div>
  </div>
</main>

<!-- SCRIPT COLAPSABLE -->
<script>
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.maxHeight){
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    } 
  });
}
</script>
<!-- SCRIP COLAPSABLE END -->


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
</html>