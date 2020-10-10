<?php

     require_once("Config/Autoload.php");
     include('Header.php');
     include('Nav.php');

     use Models\Cinema as Cinema;
     use DAO\CinemaDAO as CinemaDAO;

     $cinemaRepository = new CinemaDAO();
     $cinemasList = $cinemaRepository->GetAll();

?>
<main class="">     
     <section id="listado" class="">
          <div class="">
               <h2 class="">Cinema List</h2>
               <table class="">
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
                                    ?>
                                        <tr>
                                            <td><?php echo $cinema->getName(); ?></td> 
                                            <td><?php echo $cinema->getCapacity(); ?></td> 
                                            <td><?php echo $cinema->getAdress(); ?></td> 
                                            <td><?php echo $cinema->getTicketPrice(); ?></td> 
                                            <td><?php echo $cinema->getId(); ?></td>
                                        </tr>
                          <?php } ?>
                    </tbody>
               </table>
          </div>
     </section>
</main>