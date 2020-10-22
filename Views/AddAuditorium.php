<?php
    namespace Views;
    include('Header.php');
    include('Nav.php');
?>
<!-- $amountOfSeats, $idCinemaFK, $idAuditorium, $ticketPrice, $nameAuditorium, $active -->
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Add Auditorium</title>
</head>
<body>
     <section  class="">
         <div class="cont-form">
              <h2 class="form-title">Add Auditorium</h2>
                   <form  class="form" action="<?php echo FRONT_ROOT ?>/Auditorium/AddAuditorium" method="POST" class="">
                    <div>
                         <div>
                              <label class ="form-label" for="idCinemaFK">ID Cinema</label>
                              <input class="form-input" type="Text" name="idCinemaFK" value="<?php echo $cinemaID; ?>" class="" readonly>
                         </div>
                         <div>
                              <label class ="form-label" for="nameAuditorium">Name</label>
                              <input class="form-input" type="Text" name="nameAuditorium" value="" class="" required>
                         </div>
                         <div>
                              <label class ="form-label" for="amountOfSeats">Amount of Seats</label>
                              <input class="form-input" type="number" name="amountOfSeats" value="" class="" required>
                         </div>
                    </div>
                    <div>
                         <div>
                              <label class ="form-label" for="ticketPrice">Ticket Price</label>
                              <input class="form-input" type="number" name="tikcetPrice" value="" class="" required>
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