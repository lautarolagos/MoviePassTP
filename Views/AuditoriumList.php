<?php
     include('Header.php');
     include('Nav.php');
?>

     <!DOCTYPE html>
     <html lang="en">
     <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <title>Auditorium List</title>
     </head>
     <body>
          <div class="table-list"> 
               <title>Auditorium Listings - MoviePass</title>
                    <h2 class="table-title">Auditorium List</h2>
                    
                    <!-- AGREGAR AUDITORIUM -->
                    <?php if($_SESSION['isAdmin']=="1"){
                    ?>
                    <form class="form" action="<?php echo FRONT_ROOT ?>Auditorium/AddView" method="post">
                    <center><button class="button-add" type="submit" name="idCinema" value="<?php echo $idCinema ?>">Add Auditorium</button></center>
                    </form>
                    <?php }?>
                    <table>
                         <thead>
                              <th>Name</th>
                              <th>ID</th>
                              <th>Total Seats</th>
                              <th>Ticket Price</th>
                              <?php if($_SESSION['isAdmin']=="1"){?><th></th> <?php } ?>
                              <?php if($_SESSION['isAdmin']=="1"){?><th>Options</th> <?php } ?>
                             
                         </thead>
                         <tbody>
                         <?php
                              foreach($cinemasList as $cinema)
                                   {
                                        if($cinema->getIdCinema() == $idCinema)
                                        {
                                             foreach($cinema->getAuditoriums() as $auditorium)
                                             {
                                        ?>
                                             <tr>
                                                  <td><?php echo $auditorium->getNameAuditorium(); ?></td>
                                                  <td><?php echo $auditorium->getIdAuditorium(); ?></td>
                                                  <td><?php echo $auditorium->getAmountOfSeats(); ?></td>
                                                  <td><?php echo $auditorium->getTicketPrice(); ?></td>


                                                  <td>
                                                  <form action="<?php echo FRONT_ROOT ?>Billboard/ShowMoviesAPI" method="POST">
                                                  <button class="button-edit" type="submit" name="" value="">ADD MOVIE</button>
                                                  <input type="hidden" name="idAuditorium" value="<?php echo $auditorium->getIdAuditorium();?>">
                                                  </form>
                                                  </td>

                                                  <!-- Boton de Edit -->
                                                  <?php if($_SESSION['isAdmin']=="1"){
                                                   ?>
                                                   <td>
                                                   <form action="<?php echo FRONT_ROOT ?>Auditorium/ShowEditView" method="POST">
                                                   <button class="button-edit" type="submit" name="idAuditorium" value="<?php echo $auditorium->getIdAuditorium(); ?>">EDIT</button>
                                                   <input type="hidden" name="idCinema" value="<?php echo $idCinema; ?>">
                                                   <?php }?>
                                                   </form>
                                                   </td>
                                                  <!-- Boton de Delete -->
                                                  <?php if($_SESSION['isAdmin']=="1"){
                                                   ?>
                                                   <td>
                                                   <form action="<?php echo FRONT_ROOT ?>Auditorium/Delete" method="POST">
                                                   <button class="" type="submit" name="idAuditorium" value="<?php echo $auditorium->getIdAuditorium(); ?>">DELETE</button>
                                                   <input type="hidden" name="idCinema" value="<?php echo $idCinema; ?>">
                                                   <?php }?>
                                                   </form>
                                                   </td>             

                                             </tr>
                                             <?php
                                             }     
                                        }    
                                   } ?>           
                         </tbody>
                    </table>
               </div>
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