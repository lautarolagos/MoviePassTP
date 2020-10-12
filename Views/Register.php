<?php
     namespace Views;
     include_once('./Views/Header.php');
  ?>
     <!DOCTYPE html>
     <html lang="en">
     <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <title>Register - MoviePass</title>
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
     </head>
     <body>
          <div>
                 <h1>M<span>OVIE</span> P<span>ASS</span></h1>
          </div>
          <div class="cont-form">
                    <form class="form" action="<?php echo FRONT_ROOT ?>/Register/AddClient" method="POST">
                         <div>
                              <h2 class="form-title">Register</h2>
                         </div>
                         <div class="">
                              <label class ="form-label" for="email">Enter your email</label>
                              <input class="form-input"type="email" name="email" class="" placeholder="Email" required>
                         </div>
                         <div class="">
                              <label class ="form-label" for="password">Enter a password</label>
                              <input class="form-input"type="password" name="password" class="" placeholder="Password" required>
                         </div>
                         <button class="btn-submit" type="submit">Create Account</button>
                    </form>
               </div>
          </body>
     </html>
