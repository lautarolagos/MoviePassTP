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
                   <form  class="form" action="<?php echo FRONT_ROOT ?>Cinema/EditCinema" method="POST">
                    <div>
                         <div>
                              <label class ="form-label" for="nameId">Name</label>
                              <input class="form-input" type="Text" name="name" id="nameId" value="" required>
                         </div>
                         <div>
                              <label class ="form-label" for="capacityId">Capacity</label>
                              <input class="form-input" type="number" name="capacity" id="capacityId" value="" required>
                         </div>
                    </div>
                    <div>
                         <div>
                              <label class ="form-label" for="adressId">Adress</label>
                              <input class="form-input" type="Text" name="adress" id="adressId" value="" required>
                              <input type="hidden" name="idCinema" value="<?php echo $cinemaId; ?>">
                         </div>
                    </div>
                    <div>
                         <button type="submit" class="btn-submit">Save Changes</button>
                    </div>
               </form>
          </div>
     </section>

<?php if(isset($message))
                    {
                         echo $message;
                    }
                    ?>
</body>
</html>
<?php include('Footer.php') ?> 