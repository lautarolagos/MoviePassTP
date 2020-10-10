<?php
     namespace Views;
     include('Header.php');
  ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <style>
            body{
               background-image: url(Img/MoviePass.jpg);
               background-repeat: no-repeat;
               background-size: 1920px 1080px;
               -webkit-background-size: cover;
               background-size: cover;
               background-attachment: fixed;
               }
       </style>
       <title>Movie Pass®</title>
  </head>
  <body>
       <div>
            <h1>M<span>OVIE</span> P<span>ASS</span></h1>
       </div>
          <div class="cont-form">
               <form class="form" action="<?php echo FRONT_ROOT ?>/Login/Check" method="POST">
                    <div>
                         <h2 class="form-title">Log In</h2>
                    </div>
                    <div >
                         <label class ="form-label" for="email">Email</label>
                         <input class="form-input"  type="text" name="email"  placeholder="Email">
                    </div>
                    <div >
                         <label class ="form-label" for="password">Password</label>
                         <input class="form-input" type="password" name="password"  placeholder="Password">
                    </div>
                    <button class="btn-submit" type="submit">Log In</button>
               </form>
               <!-- lo de abajo no anda bien, cuidado -->
               <form class="form" action="<?php echo VIEWS_PATH ?>Register.php" method="POST">
               <button  class="btn-submit" type="submit">Register</button>
               </form>
          </div>
     <?php if(isset($message))
                    {
                         echo $message;
                    }
                    ?>
  </body>
  </html>
