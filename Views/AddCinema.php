<?php
    include('Header.php');
    include('Nav.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Add Cinema</title>
</head>
<body>
     <section  class="">
         <div class="cont-form">
              <h2 class="form-title">Add Cinema</h2>
                   <form  class="form" action="<?php echo FRONT_ROOT ?>Cinema/AddCinema" method="POST">
                    <div>
                         <div>
                              <input class="form-input" type="Text" name="name" value="" placeholder="Name" required>
                         </div>
                    </div>
                    <div>
                         <div>
                              <input class="form-input" type="Text" name="adress" value="" placeholder="Adress" required>
                         </div>
                    </div>
                    <div>
                         <button type="submit" class="btn-submit">Add</button>
                    </div>
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