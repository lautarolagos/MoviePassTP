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
                              <label class ="form-label" for="nameId">Name</label>
                              <input class="form-input" type="Text" name="name" id="nameId" value="" required>
                         </div>
                         <div>
                              <label class ="form-label" for="capacityId">Total Capacity</label>
                              <input class="form-input" type="number" name="capacity" id="capacityId" value="" required>
                         </div>
                    </div>
                    <div>
                         <div>
                              <label class ="form-label" for="adressId">Adress</label>
                              <input class="form-input" type="Text" name="adress" id="adressId" value="" required>
                         </div>
                    </div>
                    <div>
                         <button type="submit" class="btn-submit">Add</button>
                    </div>
               </form>
          </div>
     </section>
     <?php
          if(isset($message)) // Modifica el Label o lo que sea a tu gusto, vos sabes como hacerlo
          { ?>
               <label for=""><?php echo $message; ?></label>
          <?php
          }
     ?>     
     
</body>
</html>
<?php include('Footer.php') ?>