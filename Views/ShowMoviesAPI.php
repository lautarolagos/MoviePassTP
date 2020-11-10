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
    <title>Available Movies</title>

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
    <link href="<?php echo CSS_PATH ?>billboardAdmin.css" rel="stylesheet">
  </head>
  
<body>
    <header>
    <div class="navbar navbar-dark bg-dark shadow-sm">
      <div class="container d-flex justify-content-between">
        <h1 style="margin:0; padding:0;">M<span>OVIE</span> P<span>ASS</span></h1>
      </div>
    </div>
    </header>

  <main role="main">

    <div class="album py-5 bg-light">
      <div class="container">

      <div class="row">
        <?php foreach($moviesArray as $movies) { ?>
          <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
              <!-- <svg class="bd-placeholder-img card-img-top" width="100%" height="275" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title></title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em"></text></svg> -->
              <img src="https://image.tmdb.org/t/p/w342/<?php echo $movies->getPosterPath(); ?>">
              <div class="card-body">
                <p class="card-text"><?php echo $movies->getOverview();?></p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <form action="<?php echo FRONT_ROOT;?>Projection/ShowAddProjection" method="POST">
                      <button type="submit" class="button-edit">Add projection</button>
                      <input type="hidden" name="movieId" value="<?php echo $movies->getIdMovie();?>">
                      <input type = "hidden" name="idAuditorium" value="<?php echo $idAuditorium;?>">
                      <input type="hidden" name="movieRuntime" value="<?php echo $movies->getRuntime(); ?>">
                      <input type="hidden" name="posterImg" value="<?php echo $movies->getPosterPath(); ?>">
                    </form>
                  </div>
                  <small class="text-muted"><?php echo"Runtime: ".$movies->StyleRuntime($movies->getRuntime());?></small>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
    </div> 
  </body>
</main>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
</html>