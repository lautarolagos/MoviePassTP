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
     <title>Add Auditorium</title>
</head>
<body>
     <section  class="">
         <div class="cont-form">
              <h2 class="form-title">Add Auditorium</h2>
                   <form  class="form" action="<?php echo FRONT_ROOT ?>Auditorium/Add" method="POST" class="">
                    <div>
                         <div>
                            <input class="form-input"type="text" name="nameAuditorium" class="" placeholder="Auditorium Name" required>
                         </div>
                         <div>
                            <input class="form-input"type="number" name="amountOfSeats" class="" placeholder="Amount of Seats" required>
                         </div>
                         <div>
                            <input class="form-input"type="number" name="ticketPrice" class="" placeholder="Tikcet Price" required>
                         </div>
                         <div>
                         <input type="hidden" name="idCinema" value="<?php echo $idCinema;?>">
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