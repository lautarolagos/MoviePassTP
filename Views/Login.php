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
  </head>
  <body>
       <div>
            <h1>M<span>OVIE</span> P<span>ASS</span></h1>
       </div>
          <div class="cont-form">
               <form class="form" action="<?php echo FRONT_ROOT ?>Login/Check" method="POST">
                    <div>
                         <h2 class="form-title">Welcome</h2>
                    </div>
                    <div >
                         <input class="form-input"  type="text" name="email"  placeholder="Email" required>
                    </div>
                    <div >
                         <input class="form-input" type="password" name="password"  placeholder="Password" required>
                    </div>
                    <button class="btn-submit" type="submit">Log In</button>
               </form>
               <form class="form" action="<?php echo FRONT_ROOT ?>Register/ShowRegisterView" method="POST">
               <button class="btn-submit" type="submit">Register</button>
               </form>
          </div>

          <?php if(isset($message)){
                    ?>
                    <p><?php echo $message; ?></p>
               <?php }?>
          
  </body>
  </html>
