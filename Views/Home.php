<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>MoviePass 2020</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/cover/">

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
    <link href="<?php echo CSS_PATH ?>home.css" rel="stylesheet">
  </head>
  <body class="text-center">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
  <header class="masthead mb-auto">
    <div class="inner">
    <h3 class="masthead-brand">Welcome!</h3>
      <nav class="nav nav-masthead justify-content-center">
      <?php if(!isset($_SESSION['userLogedIn'])){?>
      <a class="nav-link active" href="<?php echo FRONT_ROOT ?>Session/ShowLoginView">Sign In</a> <?php } ?>
        <a class="nav-link" href="<?php echo FRONT_ROOT ?>Cinema/ShowCinemaList">Cinemas</a>
        <a class="nav-link" href="<?php echo FRONT_ROOT ?>Billboard/ShowBillboard">Billboard</a>
      </nav>
    </div>
  </header>

  <main role="main" class="inner cover">
    <h1 class="cover-heading">MoviePass</h1>
    <p class="lead">We help you find near cinemas and buy tickets for the latest movies, all from the safety of your home!</p>
    <p class="lead">
      <a href="<?php echo FRONT_ROOT ?>Cinema/ShowCinemaList" class="btn btn-lg btn-secondary">Continue</a>
    </p>
  </main>

  <footer class="mastfoot mt-auto">
    <div class="inner">
      <p>MoviePass 2020 <a href="http://www.mdp.utn.edu.ar/">UTN Mar del Plata</a></p>
    </div>
  </footer>
</div>
</body>
</html>