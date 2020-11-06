<?php
    include('Header.php');
    include('Nav.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Edit Cinema</title>
</head>
<body>
     <section  class="">
         <div class="cont-form">
              <h2 class="form-title">Edit Cinema</h2>
                    <hr>
                   <form  class="form" action="<?php echo FRONT_ROOT ?>Cinema/EditCinema" method="POST">
                    <div>
                         <div>
                              <input class="form-input" type="Text" name="name" id="nameId" value="" placeholder="Name" required>
                         </div>
                    </div>
                    <div>
                         <div>
                              <input class="form-input" type="Text" name="adress" id="adressId" value="" placeholder="Adress" required>
                              <input type="hidden" name="idCinema" value="<?php echo $cinemaId; ?>">
                         </div>
                    </div>
                    <div>
                         <button type="submit" class="btn-submit">Save Changes</button>
                    </div>
               </form>
               <form class="form" action="<?php echo FRONT_ROOT ?>Cinema/ShowCinemaList" method="POST">
                    <button class="btn-submit" type="submit">Go Back</button>
               </form>
          </div>
     </section>

     <?php 
          if($message!='')
          {
          ?>
          <div class="container">
               <div class="alert alert-danger">
                    <strong><?php echo $message; ?></strong>
               </div>
          </div>
          <?php }
          ?>
</body>
</html>
<?php include('Footer.php') ?> 