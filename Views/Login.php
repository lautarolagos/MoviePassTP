<?php
     namespace Views;
     include_once('Header.php');
  ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Sign in - MoviePass</title>
       <style>
          body 
          {
               background-image: url(https://cdn.pixabay.com/photo/2017/11/24/10/43/admission-2974645_960_720.jpg);
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
               <form class="form" action="<?php echo FRONT_ROOT ?>/Login/Check" method="POST">
                    <div>
                         <h2 class="form-title">Welcome</h2>
                    </div>
                    <div >
                         <input class="form-input"  type="text" name="email"  placeholder="Email">
                    </div>
                    <div >
                         <input class="form-input" type="password" name="password"  placeholder="Password">
                    </div>
                    <button class="btn-submit" type="submit">Log In</button>
               </form>
               <form class="form" action="<?php echo FRONT_ROOT ?>/Register/ShowRegisterView" method="POST">
               <button class="btn-submit" type="submit">Register</button>
               </form>
          </div>
     <label for="" class="form-title">
     <?php if(isset($message))
                    {
                         echo $message;
                         
                    }
                    ?>
                    </label>
  </body>
  </html>
