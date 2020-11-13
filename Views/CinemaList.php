<?php
     include('Header.php');
     include('Nav.php');
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
                              
                              <?php if((isset($_SESSION['userLogedIn'])) && $_SESSION['userLogedIn']->getIsAdmin()=="1") { ?><th></th><?php }?>
                              <?php if((isset($_SESSION['userLogedIn'])) && $_SESSION['userLogedIn']->getIsAdmin()=="1") { ?><th>Options</th><?php }?>
                              <?php if((isset($_SESSION['userLogedIn'])) && $_SESSION['userLogedIn']->getIsAdmin()=="1") { ?><th></th><?php }?>
                         </thead>
                         <tbody>
                         <?php 
                              foreach($cinemasList as $cinema)
                                   {?>
                                             <tr>
                                                  <td><?php echo $cinema->getName(); ?></td>
                                                  <td><?php echo $cinema->getCapacity(); ?></td>
                                                  <td><?php echo $cinema->getAdress(); ?></td>
                                                  <!-- Boton de Edit -->
                                                  <?php if((isset($_SESSION['userLogedIn'])) && $_SESSION['userLogedIn']->getIsAdmin()=="1") {
                                                   ?>
                                                   <td>
                                                   <form action="<?php echo FRONT_ROOT ?>Cinema/ShowCinemaEdit" method="POST">
                                                   <button class="button-edit" type="submit" name="idCinema" value="<?php echo $cinema->getIdCinema(); ?>">EDIT</button>
                                                   <?php }?>
                                                   </form>
                                                   </td>    
                                                  <!-- Boton de Delete -->
                                                  <?php if((isset($_SESSION['userLogedIn'])) && $_SESSION['userLogedIn']->getIsAdmin()=="1") {
                                                  ?>
                                                  <td>
                                                  <form action="<?php echo FRONT_ROOT ?>Cinema/DeleteCinema" method="POST">
                                                  <button class="button-delete" type="submit" name="idCinema" value="<?php echo $cinema->getIdCinema();?>">DELETE</button>
                                                  <?php }?>
                                                  </form>
                                                  </td>
                                                  <!-- Boton de Ver Salas -->
                                                  <?php if((isset($_SESSION['userLogedIn'])) && $_SESSION['userLogedIn']->getIsAdmin()=="1") {
                                                  ?>
                                                  <td>
                                                  <form action="<?php echo FRONT_ROOT ?>Cinema/ShowAuditoriums" method="POST">
                                                  <button class="button-auditoriums" type="submit" name="idCinema" value="<?php  echo $cinema->getIdCinema();?>">SEE AUDITORIUMS</button>
                                                  </form>
                                                  <?php }?>
                                                  </td>
                                             </tr>     
                              <?php     } ?>
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