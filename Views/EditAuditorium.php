<?php
    include('Header.php');
    include('Nav.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Edit Auditorium</title>
</head>
<body>
     <section  class="">
         <div class="cont-form">
              <h2 class="form-title">Edit Auditorium</h2>
                   <form  class="form" action="<?php echo FRONT_ROOT ?>Auditorium/Edit" method="POST">
                    <div>
                         <div>
                              <input class="form-input" type="Text" name="nameAuditorium" id="nameId" value="" placeholder="Name" required>
                         </div>
                         <div>
                              <input class="form-input" type="number" name="amountOfSeats" id="amountOfSeatsId" value="" placeholder="Amount of Seats" required>
                         </div>
                    </div>
                    <div>
                         <div>
                              <input class="form-input" type="number" name="ticketPrice" id="ticketPriceId" value="" placeholder="Ticket price" required>
                              <input type="hidden" name="idAuditorium" value="<?php echo $idAuditorium; ?>">
                              <input type="hidden" name="idCinema" value="<?php echo $idCinema; ?>">
                         </div>
                    </div>
                    <div>
                         <button type="submit" class="btn-submit">Save Changes</button>
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