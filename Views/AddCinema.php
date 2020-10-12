<?php
    namespace Views;
    require_once('Header.php');
    require_once('Nav.php');
         
?>
<main class="">
<title>Add Cinema - MoviePass</title>
     <section id="" class="">
          <div class="">
               <h2 class=""></h2>
               <form action="<?php echo FRONT_ROOT ?>/Cinema/AddCinema" method="POST" class="">
                    <div class="">
                         <div class="">
                              <div class="">
                                   <div class="">
                                        <div class="">
                                             <label for="">Name</label>
                                             <input type="Text" name="name" value="" class="">
                                        </div>
                                        <div class="">
                                             <label for="">Capacity</label>
                                             <input type="number" name="capacity" value="" class="">
                                        </div>
                                   </div>
                                   <div class="">
                                        <div class="">
                                             <label for="">Adress</label>
                                             <input type="Text" name="adress" value="" class="">
                                        </div>
                                        <div class="">
                                             <label for="">Ticket Price</label>
                                             <input type="number" name="ticketprice" value="" class="">
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
                    <button type="submit" name="button" class="">Add</button>
               </form>
          </div>
     </section>
</main>

<?php if(isset($message))
                    {
                         echo $message;
                    }
                    ?>

<?php include('Footer.php') ?>