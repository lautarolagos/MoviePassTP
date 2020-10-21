<?php

     require_once("Config/Autoload.php");
     include('Header.php');
     include('Nav.php');

     use Models\Cinema as Cinema;
     use DAO\CinemaDAO as CinemaDAO;

     $cinemaRepository = new CinemaDAO();
     $cinemasList = $cinemaRepository->GetAll();
?>
     <!DOCTYPE html>
     <html lang="en">
     <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <title>Cinema List</title>
     </head>
     <body>
          <div class="table-list"> 
               <title>Cinema Listings - MoviePass</title>
                    <h2 class="table-title">Cinema List</h2>
                    <table>
                         <thead>
                              <th>Name</th>
                              <th>Capacity</th>
                              <th>Adress</th>
                              <th>Ticket Price</th>
                              <th>ID</th>
                         </thead>
                         <tbody>
                         <?php
                              foreach($cinemasList as $cinema)
                                   {
                                        if($cinema->getEliminated()==0)
                                        {

                                        ?>
                                             <tr>
                                                  <td><?php echo $cinema->getName(); ?></td>
                                                  <td><?php echo $cinema->getCapacity(); ?></td>
                                                  <td><?php echo $cinema->getAdress(); ?></td>
                                                  <td><?php echo $cinema->getTicketPrice(); ?></td>
                                                  <td><?php echo $cinema->getId(); ?></td>
                                                  <td>
                                                  <?php if($_SESSION['isAdmin']=="1"){
                                                  ?>
                                                  <form class="form" action="<?php echo FRONT_ROOT ?>/Cinema/DeleteCinema" method="POST">
                                                  <button type="submit" name="cinemaId" value="<?php echo $cinema->getId();?>">Delete</button>
                                                  </td>
                                                  <?php }?>
                                             </tr>     
                              <?php     }
                                   } ?>
                         </tbody>
                    </table>
               </div>
               <?php if(isset($message)){
                    ?>
                    <p><?php echo $message; ?></p>
               <?php }?>
          </body>
     </html>