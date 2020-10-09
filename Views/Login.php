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
               }
       </style>
       <title>Movie Pass®</title>
  </head>
  <body>
  <main >
          <div class="cont-form">
               <header >
                    <h2>Log In</h2>
               </header>
               <form action="<?php echo FRONT_ROOT ?>/Login/Check" method="POST"  >
                    <div >
                         <label class ="align" for="email">Email</label>
                         <input type="text" name="email"  placeholder="Email">
                    </div>
                    <div >
                         <label for="password">Password</label>
                         <input type="password" name="password"  placeholder="Password">
                    </div>
                    <button  type="submit">Log In</button>
               </form>
               <!-- lo de abajo no anda bien, cuidado -->
               <form action="<?php echo VIEWS_PATH ?>Register.php" method="POST" >
               <button  type="submit">Register</button>
               </form>
          </div>
     </main>
     <?php if(isset($message))
                    {
                         echo $message;
                    }
                    ?>
  </body>
  </html>
