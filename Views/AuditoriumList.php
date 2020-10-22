<?php
     namespace Views;
     require_once("Config/Autoload.php");
     include('Header.php');
     include('Nav.php');

     use Models\Auditorium as Auditorium;
     use DAO\AuditoriumDAO as AuditoriumDAO;

     $auditoriumRepository = new AuditoriumDAO();
     $auditoriumById = $auditoriumRepository->GetAuditoriumByCinema($cinemaID);
     
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
                    <form class="form" action="<?php echo FRONT_ROOT ?>/Auditorium/ShowAddView" method="post">
                    <center><button type="submit" name="cinemaId" value="<?php echo $cinemaID;?>">Add Auditorium</button></center>
                    </form>
                    <?php }?>
                    <table>
                         <thead>
                              <th>Name</th>
                              <th>ID</th>
                              <th>Total Seats</th>
                              <th>Ticket Price</th>
                         </thead>
                         <tbody>
                         <?php
                              foreach($auditoriumById as $auditorium)
                                   {
                                        if($auditorium->getActive()==1)
                                        {

                                        ?>
                                             <tr>
                                                  <td><?php echo $auditorium->getNameAuditorium(); ?></td>
                                                  <td><?php echo $auditorium->getIdAuditorium(); ?></td>
                                                  <td><?php echo $auditorium->getAmountOfSeats(); ?></td>
                                                  <td><?php echo $auditorium->getTicketPrice(); ?></td>
                                             </tr>     
                              <?php     }
                                   } ?>
                         </tbody>
                    </table>
               </div>
          </body>
     </html>