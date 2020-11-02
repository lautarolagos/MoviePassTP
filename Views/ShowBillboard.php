<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Product example · Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/product/">

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
    <link href="product.css" rel="stylesheet">
  </head>
  <body>

<div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
  <div class="col-md-5 p-lg-5 mx-auto my-5">
    <h1 class="display-4 font-weight-normal"><?php echo $moviesArray[0]->getTitle(); ?></h1>
    <p class="lead font-weight-normal"><?php echo $moviesArray[0]->getOverview(); ?></p>
    <a class="btn btn-outline-secondary" href="#">Coming soon</a>
  </div>
  <div class="product-device shadow-sm d-none d-md-block"></div>
  <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
</div>

<div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3">
  <div class="bg-dark mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden">
    <div class="my-3 py-3">
      <h2 class="display-5">Yama platita en el Rocket</h2>
      <p class="lead">Llego a platino gracais al PelaK</p>
      <button type="submit">Juampa puto</button>
    </div>
    <div class="bg-light shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"><img src="/betExZlgK0l7CZ9CsCBVcwO1OjL.jpg"></div>
  </div>
  <div class="bg-light mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
    <div class="my-3 p-3">
      <h2 class="display-5">Sigue en platita</h2>
      <p class="lead">And an even wittier subheading.</p>
    </div>
    <div class="bg-dark shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"></div>
  </div>
</div>

<div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3">
  <div class="bg-light mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
    <div class="my-3 p-3">
      <h2 class="display-5">Another headline</h2>
      <p class="lead">And an even wittier subheading.</p>
    </div>
    <div class="bg-dark shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"></div>
  </div>
  <div class="bg-primary mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden">
    <div class="my-3 py-3">
      <h2 class="display-5">Another headline</h2>
      <p class="lead">And an even wittier subheading.</p>
    </div>
    <div class="bg-light shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"></div>
  </div>
</div>

<div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3">
  <div class="bg-light mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
    <div class="my-3 p-3">
      <h2 class="display-5">Another headline</h2>
      <p class="lead">And an even wittier subheading.</p>
    </div>
    <div class="bg-white shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"></div>
  </div>
  <div class="bg-light mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
    <div class="my-3 py-3">
      <h2 class="display-5">Another headline</h2>
      <p class="lead">And an even wittier subheading.</p>
    </div>
    <div class="bg-white shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"></div>
  </div>
</div>

<div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3">
  <div class="bg-light mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
    <div class="my-3 p-3">
      <h2 class="display-5">Another headline</h2>
      <p class="lead">And an even wittier subheading.</p>
    </div>
    <div class="bg-white shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"></div>
  </div>
  <div class="bg-light mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
    <div class="my-3 py-3">
      <h2 class="display-5">Another headline</h2>
      <p class="lead">And an even wittier subheading.</p>
    </div>
    <div class="bg-white shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"></div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
</html>