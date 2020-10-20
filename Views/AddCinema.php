<?php
    namespace Views;
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
                   <form  class="form" action="<?php echo FRONT_ROOT ?>/Cinema/AddCinema" method="POST" class="">
                    <div>
                         <div>
                              <label class ="form-label" for="name">Name</label>
                              <input class="form-input" type="Text" name="name" value="" class="" required>
                         </div>
                         <div>
                              <label class ="form-label" for="capacity">Capacity</label>
                              <input class="form-input" type="number" name="capacity" value="" class="" required>
                         </div>
                    </div>
                    <div>
                         <div>
                              <label class ="form-label" for="adress">Adress</label>
                              <input class="form-input" type="Text" name="adress" value="" class="" required>
                         </div>
                         <div>
                              <label class ="form-label" for="ticketPrice">Ticket Price</label>
                              <input class="form-input" type="number" name="ticketPrice" value="" class="" required>
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