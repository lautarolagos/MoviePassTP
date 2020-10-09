<?php

require_once("Config/Autoload.php");
include('Header.php');
include('Nav.php');

use Models\Cinema as Cinema;

  if(isset($_SESSION['cinemaList'])) {
   $billList = unserialize($_SESSION['cinemaList']);
  }
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
                    </thead>
                    <tbody>
                    <?php
                           if(isset($cinemaList))
                            {
                                foreach($cinemaList as $cinema)
                                {
                                    ?>
                                        <tr>
                                            <td><?php echo $cinema->getName() ?></td> 
                                            <td><?php echo $cinema->getCapacity() ?></td> 
                                            <td><?php echo $cinema->getAdress() ?></td> 
                                            <td><?php echo $cinema->getTicketPrice() ?></td> 
                                        </tr>
                                    <?php
                                }
                            }
                        ?>
                    </tbody>
               </table>
          </div>
     </section>
</main>

<?php include('footer.php') ?>